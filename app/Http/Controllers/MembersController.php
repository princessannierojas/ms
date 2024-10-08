<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
    public function members_table()
    {
        // Get the logged-in manager's ID
        $managerId = Auth::id();
        
        // Get the manager's details (optional)
        $manager = User::find($managerId);
        
        // Get the members associated with this manager
        $members = User::where('manager', $managerId)->get();
        
        // Pass the manager and members to the view
        return view("manager.members", [
            'manager' => $manager,
            'members' => $members,
        ]);
    }


    public function add_member(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Get the email entered by the user
        $email = $request->input('email');

        // Find the user by email and check if they are a member
        $member = User::where('email', $email)->where('role', 'member')->first();

        if ($member) {
            // Update the member's organization and manager information
            $member->organizations_name = Auth::user()->organizations_name;
            $member->manager = Auth::user()->id;
            $member->save();

            return redirect('/members')->with('success', 'Member added successfully.');
        } else {
            return redirect('/members')->with('error', 'Email is not registered as a member.');
        }
    }
}
