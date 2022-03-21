<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RIconResource extends JsonResource
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
            'Name' => $this->Name,
            'Icon' => $this->Icon,
            'Color' => $this->Color,
        ];
    }
}
