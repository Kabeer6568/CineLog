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
        'genre' => 'required|in:Action,Drama,Sci-Fi,Comedy,Thriller,Horror,Romance,Documentary,Animation,Crime',
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

    public function editMoviePage($id){

        $movie = Movie::findOrFail($id);

        return view('layouts.admin.admin-movies-edit' , compact('movie'));

    }

    public function eidtMovie(Request $request , $id){

        $movie = Movie::findOrFail($id);

        $data = $request->validate([

        'title' => 'nullable|string|max:255',
        'original_title' => 'nullable|string|max:255',
        'overview' => 'nullable|string|max:255',
        'release_year' => 'nullable|integer|min:1900|max:2030',
        'run_time' => 'nullable|integer',
        'director' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'language' => 'nullable|string|max:255',
        'budget' => 'nullable|numeric',
        'genre' => 'nullable|in:Action,Drama,Sci-Fi,Comedy,Thriller,Horror,Romance,Documentary,Animation,Crime',
        'cast' => 'nullable|string|max:255',
        'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'imdb_score' => 'nullable|numeric|min:0|max:10',
        'content_rating' => 'nullable|in:G,PG,PG-13,R,NC-17',
        'status' => 'nullable|in:published,draft',

        ]);

        $movie->fill(collect($data)->except(['poster'])->toArray());

        if ($request->hasFile('poster')) {
            
            if ($movie->poster && Storage::disk('public')->exists($movie->poster)) {
                Storage::disk('public')->delete($movie->poster);
            }

            $path = $request->file('poster')->store('profiles' , 'public');
            $movie->poster = $path;

        }

        $movie->save();

        return redirect()->route('admin.allMovies')->with('success' , 'Movie Updated');

    }
}
