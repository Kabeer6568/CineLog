<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{


//Admin Login

    public function login(Request $request){

        $request->validate([

        'login' => 'required|string|max:255',
        'password' => 'required|string|max:255',

        ]);

        $filterData = filter_var($request->login , FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = ([

        $filterData => $request->login,
        'password' => $request->password,

        ]);

        Auth::attempt($credentials);

        return redirect()->route('admin.dashboard')->with('success' , 'Logged In');

    }

    

}
