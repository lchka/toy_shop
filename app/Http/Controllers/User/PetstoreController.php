<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;  
use App\Models\Petstore;
class PetstoreController extends Controller
{
    
    //index to show all petstores
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('user'); // authorizes the user so be able to view this index. 

        $petstores = Petstore::all();//shows all petstores in the database
        $petstores = Petstore::paginate(5);


        return view ('user.petstores.index')->with('petstores', $petstores);
    }

    //show for the user view
    public function show(Petstore $petstore)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        if(!Auth::id()) {
            return abort(403); //if there isnt an petstore with that id then error 403
        }

        $toys= $petstore->toys;

        return view('user.petstores.show', compact('petstore','toys'));
    }

}
