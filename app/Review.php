<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['tmdb_id', 'headline', 'content', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }
}
