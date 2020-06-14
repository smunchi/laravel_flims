<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlimGenre extends Model
{
    protected $fillable = ['flim_id', 'genre_id'];

    public function flim()
    {
        return $this->belongsTo(Flim::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
