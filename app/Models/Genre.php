<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name', 'description'];

    public function flims()
    {
        return $this->belongsTo(Flim::class);
    }
}
