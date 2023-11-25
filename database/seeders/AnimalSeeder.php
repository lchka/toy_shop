<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal; // Imports the Animal model

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::factory()//creates the animal instances
        ->times(3)
        ->hasToys(4)//magic method, the one to many relationshop was defined in animal. laravel does everything else
        ->create();
    }
}
