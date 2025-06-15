<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie_0607'; // Specify the table name if it's different from the default
    // membuat kolom yang bisa diisi
    protected $fillable =['imdb', 'title', 'year', 'genre', 'poster'];

}
