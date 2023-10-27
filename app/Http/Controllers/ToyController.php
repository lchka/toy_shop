<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  shows the index of 'all toys' by accessing the model and pushing the fake db onto the front end
     
    public function index()
    {
        $toys = Toy::all();
        return view('toys.index', compact('toys'));
    }


    // shows the singular toy entity by pulling it by the individual id which is the linked in index by title 

    public function show($id)
    {
        $toy = Toy::find($id);
        return view('toys.show')->with('toy', $toy);
    }

    // s

    public function create()
    {
        return view('toys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:4 | max:20 | alpha',
            'colour' =>'required | in:value1,value2,value3',
            'size' =>'required',
            'type' =>'required',
            'description' =>'required | max:20',
            'toy_image'=>'required | max:2048 | image | mimes:jpeg, png, jpg'
        ]);
        
        Toy::create([
            'name'=>$request->name,
            'description'=>"Test Decsription",
            'colour'=>"Test Colour",
            'size'=>"Test Size",
            'type'=>"Test Type",
            'toy_image'=>"Test img",
            'created_at' =>now(),
            'updated_at'=>now()
        ]);
        return to_route ('toys.index');
    }

    /**
     * Display the specified resource.
     */


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
