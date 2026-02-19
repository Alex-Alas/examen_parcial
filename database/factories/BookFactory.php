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
            'title' => fake()->name(),
            'description' => fake()->text(),
            'isbn' => fake()->unique()->isbn10(),
            'total' => fake()->numberBetween(1, 100),
            'available' => function (array $att) {
                return fake()->numberBetween(0, $att['total']);
            },
            'status' => fake()->boolean(),
            'id' => fake()->unique()->numberBetween(1, 100)
            ];
            
          
    }
    // 
   //OverflowException  Maximum retries of 10000 reached without finding a unique value.
   // 
}
