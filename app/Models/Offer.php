<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'offer',
        'product_id',
        'accepted',
    ];

    /* Relationships */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
