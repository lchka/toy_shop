<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use illuminate\Support\Facades\Auth;  


class AnimalController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        $animals = Animal::all();

        return view ('user.animals.index')->with('animals', $animals);
    }

    public function show(string $id)
    {
        //
    }


   
}
