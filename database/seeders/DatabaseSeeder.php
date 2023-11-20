<?php

namespace Database\Seeders;
use App\Models\Toy;
use App\Models\Animal;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Toy::factory()->count(50)->create();
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(AnimalSeeder::class);

       
    }
}
