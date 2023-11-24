<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{ protected $model = \App\Models\Animal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
        return [
            'animal_name'=>$this->faker->word,
            'size'=> $this->faker->randomElement(['small', 'medium', 'large']),
            'country_origin'=>$this->faker->word,
        ];
    }
}
