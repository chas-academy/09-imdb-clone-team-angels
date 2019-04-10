<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['tmdb_id', 'headline', 'content', 'rating', 'approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
