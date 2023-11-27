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
        $user->authorizeRoles('user');
    
        $toys = $toys->paginate(5);
    
        return view('user.toys.index')->with('toys', $toys);
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