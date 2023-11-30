<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;  
use App\Models\Petstore;

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

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

 
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
        //
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
