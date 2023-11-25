<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name','admin')->first(); //defines admin and user

        $role_user= Role::where('name','user')->first();

        $admin = new User(); //adds a new user 
        $admin->name='Laura Hofmanova'; //defined admin
        $admin->email= 'N00222003@iadt.ie';
        $admin->password= Hash::make('password');
        $admin->save(); //saves this admin into the database/hardcodes it in

        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Krys Piwo'; //defined user
        $user->email= 'krys@iadt.ie';
        $user->password= Hash::make('password');
        $user->save(); //saves this user into the database/hardcodes it in


        $user->roles()->attach($role_user);

    }
}