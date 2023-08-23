<?php

namespace Database\Seeders;

use App\Models\Auction;
use App\Models\Image;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $auction = Auction::factory()->create([
            "name" => "Boot",
            "slug" => Str::slug("Boot"),
        ]);

        $product1 = Product::factory()->create([
            "name" => "Ocean Sapphire",
            "slug" => Str::slug("Ocean Sapphire"),
            "auction_id" => $auction->id
        ]);

        $product2 = Product::factory()->create([
            "name" => "Palmer & Johnson 150",
            "slug" => Str::slug("Palmer & Johnson 150"),
            "auction_id" => $auction->id
        ]);

        Offer::factory()->create([
            'product_id' => $product2->id
        ]);

        Image::create([
            "image" => "ocean-sapphire.jpg",
            "product_id" => $product1->id
        ]);

        Image::create([
            "image" => "palmer-johnson-150-1160x773.jpg",
            "product_id" => $product2->id
        ]);

        Auction::factory()->create([
            "name" => "Auto's",
            "slug" => Str::slug("Auto's"),
        ]);
    }
}
