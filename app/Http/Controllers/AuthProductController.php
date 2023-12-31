<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Auction;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthProductController extends Controller
{
    public function create(Auction $auction)
    {
        return view('products.create', compact('auction'));
    }

    public function store(StoreProductRequest $request, Auction $auction)
    {
        $product = Product::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "end_date" => $request->end_date,
            "start_valuation" => $request->start_valuation,
            "end_valuation" => $request->end_valuation,
            "auction_id" => $auction->id
        ]);

        foreach ($request->images as $image)
        {
            Image::create([
                "image" => $image->getClientOriginalName(),
                "product_id" => $product->id
            ]);

            $image->storeAs('public/auctions/'.$auction->slug.'/'.$product->slug, $image->getClientOriginalName());
        }

        return redirect()->route('auction.show', $auction)->with('succes', 'Uw product is goed opgeslagen.');
    }

    public function delete(DeleteProductRequest $request)
    {
        $product = Product::where('slug', $request->product)->first();

        Storage::deleteDirectory('public/auctions/'.$product->auction->slug.'/'.$product->slug);

        $product->delete();

        return redirect()->route('auction.show', $product->auction)->with('succes', $product->name.' is vewijderd!');
    }
}
