<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name,
            'isbn' => $this->faker->isbn13,
            'published_date' => $this->faker->date,
            // 'genre' => $this->faker->word,
            // 'price' => $this->faker->randomFloat(2, 5, 50),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
