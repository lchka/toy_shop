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
    
        // $user= Auth::user();
        // $user->authorizeRoles('admin');
        //might not need this

        $toys = $toys->paginate(5);
    
        return view('user.toys.index')->with('toys',$toys);
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