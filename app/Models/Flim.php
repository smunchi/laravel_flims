<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flim extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'release', 'date', 'rating', 'ticket', 'country', 'photo'];

    protected $dates = ['date'];

    public function genres()
    {
        return $this->belongsToMany(FlimGenre::class);
    }
}
