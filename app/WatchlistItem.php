<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchlistItem extends Model
{
    protected $fillable = ['title', 'movie_id'];
}
