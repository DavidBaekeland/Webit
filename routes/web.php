<?php

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

Route::get('/auctions/{auction}', [Controller::class, "show"])->name("actions");
