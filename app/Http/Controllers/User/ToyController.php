<?php



namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; 
use App\Models\Toy;     
use illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;

class ToyController extends Controller
{
    // this is the main controller for the entity toy, it handles all the methods and makes a template for the entity
    

    //  the index not only displays all toys by default, it allows the user to sort through the various columns and add a query, in which. The user may input key words into the input box, select a drop down option of columns and choose in which way they want it sorted. This is done by sql querying on line 29. If the toys shown are over 5 per page, the paginate then begins to work and adds multiple page option depending on the outcome of the user sorting/input. 
     
    public function index(Request $request)
{
    // Retrieve selected column and keyword for searching
    $column = $request->input('column', ''); // Default to an empty string if no column selected
    $keyword = $request->input('keyword', ''); // Default to an empty string if no keyword

    // Initialize the query
    $toys = Toy::query();

    // Search functionality for provided column and keyword
    if (!empty($column) && in_array($column, ['name', 'colour', 'type', 'size', 'animal_name'])) {
        // Search by 'animal_name' using relationship
        if ($column === 'animal_name') {
            $toys->whereHas('animal', function ($query) use ($keyword) {
                $query->where('animal_name', 'like', '%' . $keyword . '%');
            });
        } else {
            $toys->where($column, 'like', '%' . $keyword . '%');
        }
    }

    // Sorting based on custom column and direction
    $customColumn = $request->input('custom_column', ''); // Default to an empty option select
    $customDirection = $request->input('custom_direction', ''); // Default to an empty option select

    // Apply sorting only if a valid custom column is chosen
    if (!empty($customColumn) && in_array($customColumn, ['name', 'colour', 'type', 'size', 'animal_name'])) {
        $toys->orderBy($customColumn, $customDirection);
    }

    // Authorize the admin to view this index
    $user = Auth::user();
    $user->authorizeRoles('admin');

    // Paginate the results
    $toys = $toys->paginate(5);

    return view('admin.toys.index')->with('toys', $toys); // Render the view with the paginated toys data
}

    
    

    // shows the singular toy entity by pulling it by the individual id which is the linked in index by title 

    public function show($id)
    {

         // $user= Auth::user();
        // $user->authorizeRoles('admin');
        //might not need this
        $toy = Toy::find($id); 
        return view('user.toys.show')->with('toy', $toy);
       
    }

}