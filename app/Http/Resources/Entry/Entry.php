<?php

namespace App\Http\Resources\Entry;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\Category as CategoryResource;

class Entry extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //dd($this);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'www' => $this->www,
            'address' => $this->address,
            'content' => $this->content,
            'categories' => CategoryResource::Collection($this->category()->get())
        ];
        
    }
}
