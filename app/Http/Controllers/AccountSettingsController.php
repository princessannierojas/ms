<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{

    public function account_settings(Request $request)
    {
        $user_information = array(
            'info' => $request->user(), //retrieves the currently login user info
        );

        return view("manager.account_settings", $user_information);
    }


    public function member_account_settings(Request $request)
    {
        $user_information = array(
            'info' => $request->user(), //retrieves the currently login user info
        );

        return view("member.account_settings", $user_information);
    }


    public function update_account_settings(Request $request)
    {
        $user = Auth::user(); // get the currently authenticated user

        // validate the input
        $request->validate([
            'firstname_' => 'required|string|max:255',
            'lastname_' => 'required|string|max:255',
            'organizationsname_' => 'required|string|max:255',
            'email_' => 'required|email|max:255',
            'password_' => 'nullable|string|min:5',
            'profilepicture_' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // update the user information
        $user->first_name = $request->input('firstname_');
        $user->last_name = $request->input('lastname_');
        $user->organizations_name = $request->input('organizationsname_');
        $user->email = $request->input('email_');
        
        // check if password is provided and hash it
        if ($request->filled('password_')) {
            $user->password = Hash::make($request->input('password_'));
        }

        // handle profile picture upload
        if ($request->hasFile('profilepicture_')) {
            // delete the old profile picture if exists
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            // upload new profile picture
            $file = $request->file('profilepicture_');
            $fileName = time() . '.' . $file->getClientOriginalExtension(); // generate unique filename
            $file->move(public_path('profile_pictures'), $fileName); // move to public/profile_pictures

            // save file path in the database
            $user->profile_picture = 'profile_pictures/' . $fileName;
        }

        // save changes to the database
        $user->save();

        // redirect back with success message
        return redirect()->back()->with('success', 'Account settings updated successfully.');
    }


}
