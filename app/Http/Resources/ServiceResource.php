<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'Title' => $this->Title,
            'Image' => $this->Image,
            'Icon' => $this->Icon,
            'Filter_page' => $this->Filter_page,
            'Description' => $this->Description,
        ];
    }
}
