<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'uuid' => $this->faker->uuid(),
      'code' => $this->faker->unique()->randomNumber(),
      'user_id' => \App\Models\User::inRandomOrder()->first()->id,
      'author_id' => \App\Models\Author::inRandomOrder()->first()->id,
      'publisher_id' => \App\Models\Publisher::inRandomOrder()->first()->id,
      'section_id' => \App\Models\Section::inRandomOrder()->first()->id,
      'shelf_id' => \App\Models\SectionShelf::inRandomOrder()->first()->id,
      'title' => $this->faker->sentence(),
      'content' => $this->faker->paragraph(),
      'subjects' => $this->faker->words(5, true),
      'series' => $this->faker->word(),
      'copies' => $this->faker->numberBetween(1, 10),
      'papers' => $this->faker->numberBetween(1, 500),
      'part_number' => $this->faker->numberBetween(1, 5),
      'current_unit_number' => $this->faker->numberBetween(1, 10),
      'row' => $this->faker->numberBetween(1, 10),
      'position_book' => $this->faker->numberBetween(1, 10),
      'photo' => $this->faker->imageUrl(),
      'pdf' => $this->faker->fileExtension(),
      'views' => $this->faker->numberBetween(0, 1000),
      'markup' => $this->faker->boolean(),
      'is_synced' => $this->faker->boolean(),
      'created_at' => now(),
      'updated_at' => now(),
    ];
  }
}
