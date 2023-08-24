<?php

namespace App\Models;

use Carbon\Carbon;
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
        'image'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    /** Attibutes */
    public function getStartAttribute()
    {
        $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date)->format('d-m-Y');
        $startTime = Carbon::createFromFormat('Y-m-d H:i:s', $this->start_date)->format('H:i');

        return "$startDate om $startTime";

    }

    public function getEndAttribute()
    {
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date)->format('d-m-Y');
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $this->end_date)->format('H:i');

        return "$endDate om $endTime";
    }

    /** Relationships */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
