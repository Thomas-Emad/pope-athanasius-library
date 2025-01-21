<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionShelf extends Model
{
  protected $fillable = [
    'title',
    'number',
    'section_id'
  ];

  public function section(): BelongsTo
  {
    return $this->belongsTo(Section::class);
  }
}
