<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'end_date',
        'accepted',
        'start_valuation',
        'end_valuation',
        'auction_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /** Attibutes */
    public function getValuationAttribute()
    {
        return "$this->start_valuation - $this->end_valuation";
    }

    public function getEndAttribute()
    {
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date)->format('d-m-Y');
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date)->format('H:i');

        return "$endDate om $endTime";
    }

    public function getHigestOfferAttribute()
    {
        $higestOffer = $this->offers()->orderByDesc("offer")->first();
        if ($higestOffer)
        {
            return $higestOffer;
        } else
        {
            return false;
        }
    }

    /** Relationships */
    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function imageFirst()
    {
        return $this->hasMany(Image::class)
            ->pluck("image")
            ->first();
    }
}
