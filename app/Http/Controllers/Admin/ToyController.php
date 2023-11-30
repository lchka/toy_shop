<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Petstore;
use App\Models\Toy;
use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    // this is the main controller for the entity toy, it handles all the methods and makes a template for the entity


    //  the index not only displays all toys by default, it allows the user to sort through the various columns and add a query, in which. The user may input key words into the input box, select a drop down option of columns and choose in which way they want it sorted. This is done by sql querying on line 29. If the toys shown are over 5 per page, the paginate then begins to work and adds multiple page option depending on the outcome of the user sorting/input. 
    public function index(Request $request)
    {
        $column = $request->input('column', '');
        $keyword = $request->input('keyword', '');
        $sortDirection = $request->input('sort_direction', 'asc');

        $toys = Toy::query();

        if (!empty($keyword)) {
            $toys->where(function ($query) use ($column, $keyword) {
                if (!empty($column) && in_array($column, ['name', 'size', 'colour', 'type', 'company_name'])) {
                    // Query directly on the 'toys' table for selected column
                    $query->where($column, 'like', '%' . $keyword . '%');
                } else {
                    $query->where('name', 'like', '%' . $keyword . '%')
                        ->orWhere('size', 'like', '%' . $keyword . '%')
                        ->orWhere('colour', 'like', '%' . $keyword . '%')
                        ->orWhere('type', 'like', '%' . $keyword . '%')
                        ->orWhere('company_name', 'like', '%' . $keyword . '%')
                        ->orWhereHas('animal', function ($q) use ($keyword) {
                            $q->where('animal_name', 'like', '%' . $keyword . '%')
                                ->orWhere('breed', 'like', '%' . $keyword . '%');
                        });
                }
            });
        }

        if (!empty($column) && in_array($column, ['name', 'size', 'colour', 'type', 'company_name'])) {
            $toys->orderBy($column, $sortDirection);
        } elseif ($column === 'animal_name' || $column === 'animal_breed') {
            $toys->orderBy(function ($query) use ($column, $sortDirection) {
                $query->select($column)->from('animals')->whereColumn('animals.id', 'toys.animal_id')->orderBy($column, $sortDirection);
            });
        } else {
            $toys->orderBy('name', $sortDirection);
        }

        $user = Auth::user();
        $user->authorizeRoles('admin');

        $toys = $toys->paginate(5);

        return view('admin.toys.index')->with('toys', $toys);
    }

    // shows the singular toy entity by pulling it by the individual id which is the linked in index by title 

    public function show($id)
    {
        $user = Auth::user(); //asks for the already authorised user
        $user->authorizeRoles('admin'); //authroises
        $toy = Toy::find($id); //fins the specific toy by id
        return view('admin.toys.show')->with('toy', $toy); //returns admin view

    }

    // this creates function is used to show the view called toy.create which is the form for using the storing functiona and pushing and displaying the database

    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $petstores = Petstore::all(); //returns the create view, 
        $animals = Animal::all(); //returns the create view, 

        return view('admin.toys.create')->with('animals', $animals)->with('petstores', $petstores);
    }

    // stores the input placed into the boxes by validating that input put is corret and then passes it through
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
    
        $request->validate([
            'name' => 'required|min:4|max:25',
            'colour' => 'required|alpha',
            'size' => 'required|alpha',
            'type' => 'required|min:4|max:25|alpha',
            'company_name' => 'required|min:5|max:45',
            'description' => 'required|max:2058',
            'animal_id' => 'required',
            'petstores' => ['required', 'exists:petstores,id'],
            'toy_image' => 'required|image|max:2058|mimes:jpeg,png,jpg,gif'
        ]);
    
        if ($request->hasFile('toy_image')) {
            $image = $request->file('toy_image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/toys', $imageName);
            $toy_image_name = 'storage/toys/' . $imageName;
        }
    
        $toy = Toy::create([
            'name' => $request->name,
            'description' => $request->description,
            'colour' => $request->colour,
            'size' => $request->size,
            'type' => $request->type,
            'company_name' => $request->company_name,
            'animal_id' => $request->animal_id,
            'petstore' => $request->petstore,
            'toy_image' => $toy_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
        $toy->petstores()->attach($request->petstores);
    
        return redirect()->route('admin.toys.index')->with('success', 'Toy created successfully');
    }

    // the function edit allows the user to edit the preset column in the database, by accessing it through its unique id. Displaying the edit page

    public function edit(Toy $toy)
{
    $user = Auth::user();
    $user->authorizeRoles('admin');
    $animals = Animal::all();
    $petstores = Petstore::all(); // Retrieve pet stores
    return view('admin.toys.edit', [
        'toy' => $toy,
        'animals' => $animals,
        'petstores' => $petstores, // Pass $petstores to the view
    ]);
}

    //the function works similarly to the function validate, where it goes through the same process of validation and then storing if the validation is successful
    public function update(Request $request, Toy $toy)
    {
        $request->validate([
            'name' => 'required | min:4 | max:25 ',
            'colour' => 'required', //these are enums and they arent accepting, in: item1,item2, proabaly due to the datatype set.
            'size' => 'required',
            'type' => 'required | min:4 | max:25 | alpha',
            'company_name' => 'required | min:5 | max:45',
            'description' => 'required | max:2058',
            'animal_id' => 'required',
            'petstores' => ['required', 'exists:petstores,id'],
            'toy_image' => 'required | image | max:2058 | mimes:jpeg, png, jpg, gif'


        ]);

        //same as previous store for image

        if ($request->hasFile('toy_image')) {
            $image = $request->file('toy_image');
            $imageName = time() . '.' . $image->extension();
            //which is then stored (placed) into the public folder toys
            $image->storeAs('public/toys', $imageName);
            $toy_image_name = 'storage/toys/' . $imageName;
        }

        //same as the function create it proceeds to store ther vlaidated fields into the correct column

        $toy->update([
            'name' => $request->name,
            'description' => $request->description,
            'colour' => $request->colour,
            'size' => $request->size,
            'type' => $request->type,
            'company_name' => $request->company_name,
            'animal_id' => $request->animal_id,
            'petstore' => $request->petstore,
            'toy_image' => $toy_image_name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user = Auth::user();
        $user->authorizeRoles('admin');
        $toy->petstores()->attach($request->petstores);
        return to_route('admin.toys.show', $toy)->with('success', 'Toy has been updated successfully');
    }

    // the delete method, at first it wouldn't work, that was due to the config cache being overloaded. 

    public function destroy(Toy $toy)
    {
        $toy->delete(); // This will delete the toy from the database.
        $user = Auth::user();
        $user->authorizeRoles('admin');
        return to_route('admin.toys.index', $toy)->with('success', 'Toy deleted successfully');
    }

}