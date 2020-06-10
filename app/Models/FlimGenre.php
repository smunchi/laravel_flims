<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FlimGenre extends Model
{
    protected $fillable = ['flim_id', 'genre_id'];

    public function flim()
    {
        return $this->belongsTo(Flim::class);
    }
}
