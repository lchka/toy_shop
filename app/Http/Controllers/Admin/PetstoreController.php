<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\Petstore;
use App\Models\Animal;


class PetstoreController extends Controller
{

    //shows all petstores as index 

    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin'); // authorizes the admin so be able to view this index. 

        $petstores = Petstore::all(); //shows all petstores in the database

        return view('admin.petstores.index')->with('petstores', $petstores);
    }

    //makes a create template
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $petstores = Petstore::all(); //returns the create view, 
        return view('admin.petstores.create')->with('petstores', $petstores);
    }

    //makes the store function for the create of petstore
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'store_name' => 'required|min:4|max:25',
            'email' => 'required|email',
            'location' => 'required|min:25|max:125',
            'phone' => 'required|regex:/^08\d{1,9}$/'
        ]);

        // Ensure the field names here match the names in your form
        Petstore::create([
            'store_name' => $request->store_name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.petstores.index')->with('success', 'Petstore stored successfully');
    }



    //shows each petstore
    public function show(Petstore $petstore)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403); //if there isnt an petstore with that id then error 403
        }

        $toys = $petstore->toys;

        return view('admin.petstores.show', compact('petstore', 'toys'));
    }

    //edit for each petstore seperately
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Fetch the specific Petstore instance based on the provided ID
        $petstore = Petstore::findOrFail($id);

        $petstores = Petstore::all(); // Get all the petstores (if needed for your view)

        return view('admin.petstores.edit', compact('petstore', 'petstores'));
    }

    //updates the petstore
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'store_name' => 'required|min:4|max:25',
            'email' => 'required|email',
            'location' => 'required|min:25|max:125',
            'phone' => 'required|regex:/^08\d{1,9}$/'
        ]);

        // Ensure the field names here match the names in your form
        Petstore::update([
            'store_name' => $request->store_name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.petstores.index')->with('success', 'Petstore has been updated successfully');
    }

    //deleted the petstore and it associated toys
    public function destroy(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $petstore = Petstore::findOrFail($id);
    

        $petstore->toys()->detach();
    
     
        $petstore->delete();
    
        return redirect()->route('admin.petstores.index')->with('success', 'Petstore deleted successfully alongside the associated toys');
    }
    
}
