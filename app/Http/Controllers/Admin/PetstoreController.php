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

        $petstores = Petstore::all();//shows all petstores in the database

        return view ('admin.petstores.index')->with('petstores', $petstores);
    }

    //makes a create template
    public function create()
    {
        $user= Auth::user();
        $user->authorizeRoles('admin');

        $petstores= Petstore::all(); //returns the create view, 
        return view('admin.petstores.create')->with('petstores',$petstores);
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

        if(!Auth::id()) {
            return abort(403); //if there isnt an petstore with that id then error 403
        }

        $toys= $petstore->toys;

        return view('admin.petstores.show', compact('petstore','toys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        
        $petstores = Petstore::all();//get all the petstores
        return view('admin.petstores.edit', compact('petstore', 'petstores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
