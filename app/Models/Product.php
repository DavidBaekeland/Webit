<?php

namespace App\Models;

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
        'accepted'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* Relationships */
    public function action(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class);
    }
}
