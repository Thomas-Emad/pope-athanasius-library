<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordDaily extends Model
{
    protected $fillable = [
        'said',
        'content',
        'number_show',
        'is_today'
    ];

    public static function scopeRandom($query)
    {
        return $query->orWhereRaw('1=1')->inRandomOrder();
    }
}
