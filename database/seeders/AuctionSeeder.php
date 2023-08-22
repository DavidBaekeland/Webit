<?php

namespace Database\Seeders;

use App\Models\Auction;
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
        Auction::factory()->create([
            "name" => "Boot",
            "slug" => Str::slug("Boot"),
        ]);

        Auction::factory()->create([
            "name" => "Auto's",
            "slug" => Str::slug("Auto's"),
         ]);
    }
}
