<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Runs the database seeding for users such as Administrators and ordinary users.
     */
    public function run(): void
    {
        $role_admin= new Role(); //creates now role which is the admin
        $role_admin->name = 'admin';//defines admin
        $role_admin->description= 'An Administrator user';
        $role_admin->save();

        $role_user= new Role(); //creates now role which is the user
        $role_user->name = 'user';//defines user
        $role_user->description = 'An Ordidnary User';
        $role_user->save();

        }
}