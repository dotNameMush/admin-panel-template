<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function edit()
    {
        return view('dashboard.editprofile');
    }
    public function view()
    {
        return view('dashboard.profile');
    }
}
