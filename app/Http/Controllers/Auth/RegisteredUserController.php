<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the 'user' role to the new user by default
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);


    }
    public function showPromoteForm(): View   //creates the view for the form so that the admin can choose who to promote
    {
        // Retrieve ordinary users who are not admins from the database
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get(['id', 'name']);

        return view('admin.promote', ['users' => $users]);
    }

    public function promoteUser(Request $request): RedirectResponse //this is the code that changed the ordinary user to admin
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],//makes sure that we have to choose a user in order for it to process
        ]);

        // Find the selected user
        $user = User::findOrFail($request->user_id);//user must exist

        // Attach the 'admin' role to the selected user
        $role = Role::where('name', 'admin')->first();//where the name is user role change to admin
        $user->roles()->sync($role);//sync with the rest of the project

        return redirect()->route('admin.toys.index')->with('success', 'User promoted to admin successfully!');//redirected
    }
}