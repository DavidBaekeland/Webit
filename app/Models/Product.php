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
        'end_valuation'
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
}
