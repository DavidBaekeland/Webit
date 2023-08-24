<?php

namespace App\Console\Commands;

use App\Models\Auction;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AcceptOffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:accept-offer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command checks who is the winner of the bidding. An email will then be sent.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endProducts = Product::where('end_date', '<=', now())->get();

        foreach ($endProducts as $endProduct)
        {
            if ($endProduct->higestOffer && $endProduct->higestOffer->accepted==0)
            {
                $higestOffer = Offer::find($endProduct->higestOffer->id);
                $higestOffer->accepted = 1;
                $higestOffer->save();

                Mail::to($higestOffer->email)->queue(new \App\Mail\AcceptOffer($higestOffer, $endProduct));
            }
        }
    }
}
