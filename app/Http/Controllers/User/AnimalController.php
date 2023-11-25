<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;  
use App\Models\Animal;


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
        $user = Auth::user();
        $user->authorizeRoles('user');

        if(!Auth::id()) {
            return abort(403);
        }
        $animal = Animal::findOrFail($id);
        $toys= $animal->toys;

        return view('user.animals.show', compact('animal','toys'));
    }


   
}
