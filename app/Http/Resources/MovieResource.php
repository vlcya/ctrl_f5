<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'id' => $this->id,
            'status' => $this->status,
            'name' => $this->name,
            'rating' => $this->rating,
            'directors' => $this->artists->where('artist_title_id', 3)->implode('name', ', '),
            'writers' => $this->artists->where('artist_title_id', 2)->implode('name', ', '),
            'stars' => $this->artists->where('artist_title_id', 1)->implode('name', ', '),
            'description' => $this->description,
            'image' => $this->image,
            'deleted' => $this->deleted_at,
        ];
    }
}
