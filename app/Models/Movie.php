<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'original_title',  
        'overview',
        'release_year',    
        'run_time',         
        'director',
        'country',
        'language',
        'budget',
        'genre',
        'cast',
        'poster',
        'imdb_score',
        'content_rating',
        'status',
    ];
}
