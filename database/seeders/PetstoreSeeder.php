<?php

namespace Database\Seeders;

use App\Models\Petstore;
use App\Models\Toy;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PetstoreSeeder extends Seeder
{
    //Petstore seeder creates instances of the many to many pivot table
    public function run(): void
    {
        Petstore::factory()
        ->times(3)//3 instances of many to many
        ->create();

        foreach(Toy::all() as $toy)
        {
            $petstores = Petstore::inRandomOrder()->take(rand(1,3))->pluck('id');
            $toy->petstores()->attach($petstores);
        }
    }
}
