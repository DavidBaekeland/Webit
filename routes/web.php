<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthProductController;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, "welcome"]);
Route::post('/contact', [Controller::class, "contact"])->name('contact');

Route::get('/auctions/{auction}', [Controller::class, "show"])->name("actions");
Route::get('/auctions/{auction}/{product}', [Controller::class, "product"])->name("product");
Route::post('/auctions/{auction}/{product}', [Controller::class, "offer"])->name("product.offer");

Route::get('/products/{auction}', [AuthProductController::class, "create"])
    ->middleware('auth')
    ->name("product.create");

Route::post('/products/{auction}', [AuthProductController::class, "store"])
    ->middleware('auth')
    ->name("product.store");


Route::get('/dashboard', function () {
    $auctions = Auction::all();
    return view('dashboard', compact('auctions'));
})->middleware("auth")->name('dashboard');

Route::get('/auction/{auction}', [AuctionController::class, "showLogin"])
    ->middleware('auth')
    ->name("auction.show");

Route::get('/auction/create', [AuctionController::class, "create"])
    ->middleware('auth')
    ->name("auction.create");

Route::post('/auction', [AuctionController::class, "store"])
    ->middleware('auth')
    ->name("auction.store");

require __DIR__.'/auth.php';
