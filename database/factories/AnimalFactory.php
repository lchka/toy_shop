<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal_name'=>fake()->word,
            'size'=>fake()->randomElement(['small', 'medium', 'large']),//made into an enum like in the toy factory
            'country'=>fake()->word,
        ];
    }
}
