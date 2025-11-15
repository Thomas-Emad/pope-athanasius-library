<?php

namespace App\Models;

use App\Traits\BookScopes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
  use HasFactory, BookScopes;

  protected $fillable = [
    'uuid',
    'code',
    'user_id',
    'author_id',
    'publisher_id',
    'section_id',
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
    'markup',
    'views',
    'is_synced'
  ];

  public static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      if (!$model->uuid) {
        $model->uuid = (string) Str::uuid();
      }
    });
  }

  /**
   * Get the user that the book belongs to.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the section that the book belongs to.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function section()
  {
    return $this->belongsTo(Section::class);
  }

  /**
   * Get the shelf that the book belongs to.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function shelf()
  {
    return $this->belongsTo(SectionShelf::class);
  }

  /**
   * Get the author that owns the Book.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function author()
  {
    return $this->belongsTo(Author::class);
  }

  /**
   * Get the publisher that owns the Book.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function publisher()
  {
    return $this->belongsTo(Publisher::class);
  }
}
