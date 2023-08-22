<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        $auctions = Auction::all();
        $auctions->load('products');

        return view('welcome')->with(["auctions" => $auctions]);
    }
}
