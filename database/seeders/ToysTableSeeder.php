<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Toy;
use App\Models\Animal;


class ToysTableSeeder extends Seeder
{
    /**
     * creates the amount or row created in the data from the factory and migrations, '15'
     * represents the number of rows we want created. Thrpugh the create function in toycontroller
     */
    public function run()
    {
        // Define an array of animal IDs
        $animalIds = [1, 2, 3];

        // Generate 35 toys
        Toy::factory()->count(35)->create([
            'animal_id' => function () use ($animalIds) {
                // Randomly select an animal_id from the array
                return $animalIds[array_rand($animalIds)];
            },
        ]);
    }
}
