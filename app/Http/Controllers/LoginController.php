<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_form()
    {
        return view ("login_form");
    }



    public function login_process(Request $request)
    {
        $credentials = array(
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        );

        if (Auth::attempt($credentials)) {
            // Get the logged-in user
            $user = Auth::user();

            // redirect based on the user's role
            if ($user->role === 'manager') {
                return redirect()->route('manager.home'); 
            } elseif ($user->role === 'member') {
                return redirect()->route('member.home');
            }
        }
            
        // if email/password is wrong
        return redirect('/')->with('error', 'Wrong Email or Password.');
    }
    

    
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
