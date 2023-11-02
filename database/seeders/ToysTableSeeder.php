<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Toy;



class ToysTableSeeder extends Seeder
{
    /**
     * creates the amount or row created in the data from the factory and migrations, '15'
     * represents the number of rows we want created. Thrpugh the create function in toycontroller
     */
    public function run()
    {
        Toy::factory(15)->create();
    }
}
