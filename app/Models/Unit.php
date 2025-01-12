<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    protected $fillable = [
        'title',
        'number'
    ];

    public function  shelfs(): HasMany
    {
        return $this->hasMany(UnitShelf::class);
    }

    public function  books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
