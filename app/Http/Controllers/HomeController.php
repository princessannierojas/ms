<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function manager_home()
    {
        return view('manager.home'); 
    }

    public function member_home()
    {
        return view('member.home'); 
    }

}
