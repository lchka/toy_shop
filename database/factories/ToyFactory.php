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
            'colour'=>fake()->randomElement(['red', 'green', 'mixed','black','white','orange','purple','blue','yellow','pink','brown']),
            'size'=>fake()->randomElement(['small', 'medium', 'large']),//cant use enum for fake/faker, must use randomElement
            'type'=>fake()->randomElement(['training','rope','bone','stick','stuffed']),
            'toy_image'=>fake()->imageUrl,
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
