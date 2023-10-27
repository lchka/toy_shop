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

    // this creates function is used to show the view called toy.create which is the form for using the storing functiona and pushing and displaying the database

    public function create()
    {
        return view('toys.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:4 | max:25 ',
            'colour' =>'required', //these are enums and they arent accepting, in: item1,item2, proabaly due to the datatype set.
            'size' =>'required',
            'type' =>'required | min:4 | max:25 | alpha',
            'description' =>'required | max:2058',
            'toy_image' => 'required | image | max:2058 | mimes:jpeg, png, jpg, gif'
           
            
        ]);
        
        if ($request->hasFile('toy_image')){
            $image = $request->file('toy_image');
            $imageName = time() . '.' . $image->extension();

            $image->storeAs('public/toys' , $imageName);
            $toy_image_name = 'storage/toys/' . $imageName;
        }


        
// this create is for taking the input placed into these individual create form, which is then pushed into the Toy model, then into the database and then placed in the view of index and show

        Toy::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'colour'=>$request->colour,
            'size'=>$request->size,
            'type'=>$request->type,
            'toy_image'=>$toy_image_name,
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
