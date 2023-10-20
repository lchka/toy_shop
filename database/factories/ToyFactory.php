<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toy>
 */
class ToyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence,
            'description'=>fake()->paragraph,
            'colour'=>fake()->word,
            'size'=>fake()->word,
            'type'=>fake()->word,
            'toy_image'=>fake()->imageUrl,
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
