<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;  
use App\Models\Animal;
class AnimalController extends Controller
{
   
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin'); // authorizes the admin so be able to view this index. 

        $animals = Animal::all();//shows all animals in the database
        $animals = Animal::paginate(5);


        return view ('admin.animals.index')->with('animals', $animals);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user= Auth::user();
        $user->authorizeRoles('admin');

        $animals= Animal::all(); //returns the create view, 
        return view('admin.animals.create')->with('animals',$animals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = Auth::user();
    $user->authorizeRoles('admin');//authorises the admin user

    $request->validate([
        'animal_name' => 'required|min:4|max:25',
        'size' => 'required|alpha',//validation requirements for the animal entity
        'country' => 'required|min:5|max:45',
        'breed' => '',//no requirements
    ]);

    Animal::create([
        'animal_name' => $request->animal_name, // Get the name of the animal and display it
        'size' => $request->size,
        'country' => $request->country,
        'breed' => $request->breed,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.animals.index')->with('success', 'Animal stored successfully'); //success message
}

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
            return abort(403); //if there isnt an animal with that id then error 403
        }

        $toys= $animal->toys;

        return view('admin.animals.show', compact('animal','toys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        
        $animals = Animal::all();//get all the animals
        return view('admin.animals.edit', compact('animal', 'animals'));
    }

    public function update(Request $request, Animal $animal)
{
    $user = Auth::user();
    $user->authorizeRoles('admin');

    $request->validate([
        'animal_name' => 'required|min:4|max:25',
        'size' => 'required|alpha',
        'country' => 'required|min:5|max:45',
        'breed' => 'required|min:5|max:45',
    ]);//uses similar methods to validate like in the create

    $animal->update([
        'animal_name' => $request->animal_name, 
        'size' => $request->size,
        'country' => $request->country,
        'breed' => $request->breed,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.animals.show', $animal)->with('success', 'Animal has been updated successfully');
}

    public function destroy(Animal $animal)
    {
        $animal->delete(); // This will delete the toy from the database.
        $user= Auth::user();
        $user->authorizeRoles('admin');
        return to_route ('admin.animals.index', $animal)->with('success','Animal deleted successfully alongside the associated toys');
    }
}
