<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Movie View Admin Page

    public function allMovies(){

        $movies = Movie::all();

        return view('layouts.admin.admin-movies-index' , compact('movies'));

    }
    
    public function moviesPage(){

        $user = auth()->user();

        return view('layouts.admin.admin-movies-create');

    }

    public function createMovie(Request $request){

        $validate = $request->validate([

        'title' => 'required|string|max:255',
        'original_title' => 'nullable|string|max:255',
        'overview' => 'required|string|max:255',
        'release_year' => 'required|integer|min:1900|max:2030',
        'run_time' => 'required|integer',
        'director' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'language' => 'required|string|max:255',
        'budget' => 'nullable|numeric',
        'genre' => 'required|string|max:255',
        'cast' => 'required|string|max:255',
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'imdb_score' => 'nullable|numeric|min:0|max:10',
        'content_rating' => 'nullable|in:G,PG,PG-13,R,NC-17',
        'status' => 'nullable|in:published,draft',

        ]);

        if ($request->hasFile('poster')) {
            $validate['poster'] = $request->file('poster')->store('posters' , 'public');
        }

        $validate['status'] = $validate['status'] ?? 'draft';

        $movies = Movie::create($validate);

        return redirect()->route('admin.allMovies')->with('success' , 'Movie Added');

    }
}
