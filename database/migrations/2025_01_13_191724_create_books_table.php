<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('books', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid')->unique();
      $table->integer('code')->unique();

      $table->foreignId('user_id')->nullable()->constrained('users')->noActionOnDelete();
      $table->foreignId('author_id')->nullable()->constrained('authors')->noActionOnDelete();
      $table->foreignId('publisher_id')->nullable()->constrained('publishers')->noActionOnDelete();
      $table->foreignId('section_id')->nullable()->constrained('sections')->noActionOnDelete();
      $table->foreignId('shelf_id')->nullable()->constrained('section_shelves')->noActionOnDelete();

      $table->string('title')->nullable();
      $table->text('content')->nullable();
      $table->text('subjects')->nullable();

      $table->string('series')->nullable();
      $table->integer('copies')->nullable()->default(1);
      $table->integer('papers')->nullable()->default(1);
      $table->integer('part_number')->default(1);

      $table->integer('current_unit_number')->default(1);
      $table->integer('row')->default(1);
      $table->integer('position_book')->default(1);

      $table->string('photo')->nullable();
      $table->string('pdf')->nullable();

      $table->integer('views')->default(0);
      $table->boolean('markup')->default(false);

      $table->boolean('is_synced')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('books');
  }
};
