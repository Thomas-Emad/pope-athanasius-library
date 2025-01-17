<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'code',
        'user_id',
        'unit_id',
        'author_id',
        'publisher_id',
        'shelf_id',
        'title',
        'content',
        'subjects',
        'series',
        'copies',
        'papers',
        'part_number',
        'current_unit_number',
        'row',
        'position_book',
        'photo',
        'pdf',
        'markup'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function shelf()
    {
        return $this->belongsTo(UnitShelf::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
