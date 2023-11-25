<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Toy; //call for toy entity

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      // Toy::factory()->count(50)->create(); //creates 50 instances of the database toys
       $this->call(RoleSeeder::class); //seeds roles
       $this->call(UserSeeder::class);//seeds user with the hardcoded users
       $this->call(AnimalSeeder::class);

       
    }
}