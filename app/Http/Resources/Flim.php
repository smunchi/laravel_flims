<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Flim extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'release' => $this->release,
            'date' => $this->date->toDateTimeString(),
            'rating' => $this->rating,
            'ticket' => $this->ticket,
            'country' => $this->country,
            'photo' => Storage::url('flims/' . $this->photo)
        ];
    }
}
