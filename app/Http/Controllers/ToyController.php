<?php



namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    // this is the main controller for the entity toy, it handles all the methods and makes a template for the entity//
    

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
     * Show the form for editing the specified resource.
     */
    public function edit(Toy $toy)
    {
        return view('toys.edit')->with('toy', $toy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toy $toy)
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

        $toy->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'colour'=>$request->colour,
            'size'=>$request->size,
            'type'=>$request->type,
            'toy_image'=>$toy_image_name,
            'created_at' =>now(),
            'updated_at'=>now()
        ]);        
        return to_route ('toys.show', $toy)->with('success','Toy has been updated successfully');
    }

// the delete method, at first it wouldn't work, that was due to the config cache being overloaded. 

    public function destroy(Toy $toy)
    { 
        $toy->delete(); // This will delete the toy from the database.
    
        return to_route ('toys.index', $toy)->with('success','Toy deleted successfully');
    }
    

}
