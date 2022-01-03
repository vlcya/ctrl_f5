<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movie extends Model
{
    //
    use SoftDeletes;

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function scopeRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeDirector($query, $title)
    {
        return $query->with('artists')->where('artists.artist_title_id', $title);
    }
}
