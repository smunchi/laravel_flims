<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flim extends Model
{
    protected $fillable = ['name', 'description', 'release', 'date', 'rating', 'ticket', 'country', 'photo'];

    protected $dates = ['date'];

    public function genres()
    {
        return $this->belongsToMany(FlimGenre::class);
    }
}
