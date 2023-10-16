<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Toy;

class ToysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Toy::factory(15)->create();
    }
}
