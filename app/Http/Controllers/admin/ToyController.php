<?php



namespace App\Http\Controllers;

use App\Models\Toy;         
use Illuminate\Http\Request;

class ToyController extends Controller
{
    // this is the main controller for the entity toy, it handles all the methods and makes a template for the entity
    

    //  the index not only displays all toys by default, it allows the user to sort through the various columns and add a query, in which. The user may input key words into the input box, select a drop down option of columns and choose in which way they want it sorted. This is done by sql querying on line 29. If the toys shown are over 5 per page, the paginate then begins to work and adds multiple page option depending on the outcome of the user sorting/input. 
     
    public function index(Request $request)
    {
        $column = $request->input('column', ''); // Default to an empty string if no column selected
        $keyword = $request->input('keyword', ''); // Default to an empty string if no keyword
    
        $toys = Toy::query();
    
        if (!empty($column) && in_array($column, ['name', 'colour', 'type', 'size'])) {
            $toys->where($column, 'like', '%' . $keyword . '%');
        }
    
        $customColumn = $request->input('custom_column', ''); // both default to empty option select
        $customDirection = $request->input('custom_direction', ''); //both default to empty option select
    
        // Only apply sorting if a valid custom column is chosen
        if (!empty($customColumn) && in_array($customColumn, ['name', 'colour', 'type', 'size'])) {
            $toys->orderBy($customColumn, $customDirection); // if the the column is not empty and the options arent selected order it by the column and direction. This allows the input ox to not be required when selecting the columns and directions.
        }
    
        $toys = $toys->paginate(5);
    
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
    
    // stores the input placed into the boxes by validating that input put is corret and then passes it through
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:4 | max:25 ', //min is used for the smallest amount alloiwed in the input box and max for the largest
            'colour' =>'required | alpha', //alpha is used to validate that the string doesn't contain numbers
            'size' =>'required | alpha',
            'type' =>'required | min:4 | max:25 | alpha',
            'company_name'=> 'required | min:5 | max:45',
            'description' =>'required | max:2058',
            'toy_image' => 'required | image | max:2058 | mimes:jpeg, png, jpg, gif'
           //image validation is validating that input is placed, mimes is used to validate the type of file placed
            
        ]);
        
            //this creates a unique name for every singel file placed into the file input box, and generates the name by time stamp

        if ($request->hasFile('toy_image')){
            $image = $request->file('toy_image');
            $imageName = time() . '.' . $image->extension();
            //which is then stored (placed) into the public folder toys
            $image->storeAs('public/toys' , $imageName);
            $toy_image_name = 'storage/toys/' . $imageName;
        } 


        
            // this create is for taking the input placed into these individual create form, which is then pushed into the Toy model, then into the database and then placed in the view of index and show, then show cases the alert message

        Toy::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'colour'=>$request->colour,
            'size'=>$request->size,
            'type'=>$request->type,
            'company_name'=>$request->company_name,
            'toy_image'=>$toy_image_name,
            'created_at' =>now(),
            'updated_at'=>now()
        ]);

        //then return to the view index if storing is successful, with a message

        return to_route ('toys.index')->with('success','Toy created successfully');
    }

    

        // the function edit allows the user to edit the preset column in the database, by accessing it through its unique id. Displaying the edit page

    public function edit(Toy $toy)
    {
        return view('toys.edit')->with('toy', $toy);
    }

        //the function works similarly to the function validate, where it goes through the same process of validation and then storing if the validation is successful
    public function update(Request $request, Toy $toy)
    {
        $request->validate([
            'name' => 'required | min:4 | max:25 ',
            'colour' =>'required', //these are enums and they arent accepting, in: item1,item2, proabaly due to the datatype set.
            'size' =>'required',
            'type' =>'required | min:4 | max:25 | alpha',
            'company_name'=> 'required | min:5 | max:45',
            'description' =>'required | max:2058',
            'toy_image' => 'required | image | max:2058 | mimes:jpeg, png, jpg, gif'
           
            
        ]);

        //same as previous store for image

        if ($request->hasFile('toy_image')){
            $image = $request->file('toy_image');
            $imageName = time() . '.' . $image->extension();
            //which is then stored (placed) into the public folder toys
            $image->storeAs('public/toys' , $imageName);
            $toy_image_name = 'storage/toys/' . $imageName;
        } 

        //same as the function create it proceeds to store ther vlaidated fields into the correct column

        $toy->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'colour'=>$request->colour,
            'size'=>$request->size,
            'type'=>$request->type,
            'company_name'=>$request->company_name,
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
