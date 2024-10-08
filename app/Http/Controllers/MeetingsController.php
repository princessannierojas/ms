<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Meetings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MeetingsController extends Controller
{
    
    public function manager_meetings()
    {
        // fetch only the members added by the currently logged-in user
        $meetings_of_cliu = Meetings::where('user_id', Auth::id())->get();
        
        return view("manager.meetings", compact('meetings_of_cliu'));
    }


    public function add_meeting(Request $request)
    {
        $meeting_info = [
            'title' => $request->input('meeting_title'),
            'location' => $request->input('meeting_location'),
            'date' => $request->input('meeting_date'),
            'time' => $request->input('meeting_time'),
            'notes' => $request->input('meeting_notes', "To update the meeting notes, click the ellipsis icon and select 'Edit Notes' to add or modify your actual meeting notes."), 
            'user_id' => Auth::id(),
        ];

        Meetings::create($meeting_info);

        return redirect('/meetings')->with('success_message', 'Meeting added successfully!');
    }



    public function edit_notes($id)
    {
        $meeting_info = Meetings::findOrFail($id);
        return view('manager.notes', compact('meeting_info'));
    }


    public function delete_meeting($id)
    {
        $meeting = Meetings::findOrFail($id);
        $meeting->delete();

        return redirect('/meetings')->with('success_message', 'Meeting notes deleted successfully!');
    }


    

    public function update_meeting(Request $request, $id)
    {
        $meeting_info = Meetings::findOrFail($id);
        $meeting_info->notes = $request->input('notes');
        $meeting_info->save();

        return redirect('/meetings')->with('success_message', 'Meeting notes updated successfully!');
    }



    public function member_meetings()
    {
        // Get the logged-in member
        $member = Auth::user(); // This gives you the currently authenticated member

        // Get the manager's ID from the member's record
        $manager_id = $member->manager; // Assuming the member model has a 'manager' field

        // Fetch meetings where the user_id matches the manager's ID
        $meetings_of_manager = Meetings::where('user_id', $manager_id)->get();

        return view('member.meetings', compact('meetings_of_manager'));
    }





    
}
