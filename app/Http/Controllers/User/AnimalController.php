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
        $user->authorizeRoles('user');// authorizes the user so be able to view this index. 

        $animals = Animal::all();//shows all animals in the database
        $animals = Animal::paginate(5);


        return view ('user.animals.index')->with('animals', $animals);//returns user view
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if(!Auth::id()) {
            return abort(403);
        } //if there isnt an animal with that id then error 403
        $animal = Animal::findOrFail($id);// if the record is not found itll run a ModelNotFoundException
        $toys= $animal->toys; //links all toys with the animal and displays associated toys 

        return view('user.animals.show', compact('animal','toys'));
    }


   
}
