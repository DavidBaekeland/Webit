<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'img'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* Relationships */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
