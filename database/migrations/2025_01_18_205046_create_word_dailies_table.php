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
        Schema::create('word_dailies', function (Blueprint $table) {
            $table->id();
            $table->string('said')->nullable();
            $table->text('content')->nullable();
            $table->integer('number_show')->nullable()->unique();
            $table->boolean('is_today')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_dailies');
    }
};
