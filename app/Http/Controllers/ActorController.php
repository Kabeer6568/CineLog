<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    public function createActorPage(){

        $user = auth()->user();

        return view('layouts.admin.admin-actors-create');

    }

    public function createActor(Request $request){

        $validate = $request->validate([

        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'bio' => 'required|string|max:255',
        'dob' => 'required|date',
        'nationality' => 'required|string|max:255',
        'pob' => 'required|string|max:255',
        'known_for' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'film' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('photo')) {
            $validate['photo'] = $request->file('photo')->store('photo' , 'public');
        }

        $actors = Actor::create($validate);

        return redirect()->route('admin.createActorPage')->with('success' , 'Actor Added');

    }

}
