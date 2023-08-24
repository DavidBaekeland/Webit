<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuctionRequest;
use App\Models\Auction;
use Illuminate\Support\Str;

class AuctionController extends Controller
{
    public function create()
    {
        return view('auctions.create');
    }

    public function store(StoreAuctionRequest $request)
    {
        $auction = Auction::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "image" => $request->file('image')->getClientOriginalName()
        ]);

        $request->file("image")->storeAs('public/auctions/'.$auction->slug, $request->file('image')->getClientOriginalName());

        return redirect()->route("dashboard")->with("succes", "Uw veiling is goed aangemaakt");
    }

    public function showLogin(Auction $auction)
    {
        $products = $auction->products;
        return view('auctions.showLogin', compact('products', 'auction'));
    }
}
