<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\StoreOfferRequest;
use App\Mail\ConfirmationOffer;
use App\Mail\Contact;
use App\Models\Auction;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        $auctions = Auction::all();
        $auctions->load('products');
        $uniqueProducts = Product::where("unique", 1)->get();

        return view('welcome', compact('auctions', 'uniqueProducts'));
    }

    public function show(Auction $auction)
    {
        $products = $auction->products;
        return view('auction', compact('products'));
    }

    public function product(Auction $auction, Product $product)
    {
        $product->load(['images', 'offers']);
        return view('product', compact('product', 'auction'));
    }

    public function offer(StoreOfferRequest $request, Auction $auction, Product $product)
    {
        $offer = Offer::create([
            'email' => $request->email,
            'offer' => $request->offer,
            'product_id' => $product->id
        ]);

        Mail::to($request->email)->queue(new ConfirmationOffer($offer, $product));

        return redirect()->back()->with('succes', 'Uw bod is goed ontvangen.');
    }


    public function contact(ContactRequest $request)
    {
        Mail::to($request->email)
            ->cc(env('MAIL_FROM_ADDRESS'))
            ->queue(new Contact($request->name, $request->message));

        return redirect()->back()->with('succes', 'Uw bericht is goed ontvangen.');
    }
}
