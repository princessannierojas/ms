<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{


    public function sign_up_form()
    {
        return view("sign_up_form");
    }

    

    public function sign_up_process(Request $request)
    {
        // check if passwords match
        if ($request->input("password") != $request->input("confirm_password")) {
            return redirect("/sign_up_form")->with('error', 'Passwords do not match.');
        }

        // check if the email is already registered
        $email_used = User::where('email', $request->input('email'))->first();
        if ($email_used) {
            return redirect("/sign_up_form")->with('error', 'The email is already registered.');
        }

        // create the user first
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'organizations_name' => $request->input('organizations_name') ?? 'og_name',
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            'profile_picture' => 'profile_pictures/msdefault.jpg',
            'manager' => 0, // default value
        ]);

        // if the user signed up as a manager, update the 'manager' column to their ID
        if ($request->input('role') === 'manager') {
            $user->manager = $user->id; // set manager to user's ID
            $user->save(); 
        }

        return redirect("/")->with('success', 'Account successfully created.');
    }

}




















// $information = array(
    //'first_name' => $request->input('first_name'),
    //'last_name' => $request->input('last_name'),
    //'organizations_name' => $request->input('organizations_name') ?? 'og_name',
    //'email' => $request->input('email'),
    //'password' => Hash::make($request->input('password')),
    //'role' => $request->input('role'),
    //'profile_picture' => 'profile_pictures/msdefault.jpg',
    //'manager' => $managerValue,
// );
// Create the user
// User::create($information);