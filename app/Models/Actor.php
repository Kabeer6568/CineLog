<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = [

    'first_name',
    'last_name',
    'bio',
    'dob',
    'nationality',
    'pob',
    'known_for',
    'photo',
    'film',

    ];
}
