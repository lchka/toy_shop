<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Toy;
use App\Models\Animal;

class ToyFactory extends Factory
{
    
    public function definition()
    {
       
      return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'colour' => $this->faker->randomElement(['red', 'green', 'blue']), // Modify as needed
            'size' => $this->faker->randomElement(['small', 'medium', 'large']), // Modify as needed
            'company_name' => $this->faker->company,
            'type' => $this->faker->word,
            'toy_image' => $this->faker->imageUrl(),
            
            'created_at' => now(),
            'updated_at' => now(),
           
        ];
    }
}
