<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
    public function movies()
    {
        $this->belongsToMany(Movie::class);
    }

    public function title()
    {
        return $this->belongsTo(ArtistTitle::class, 'artist_title_id');
    }
}
