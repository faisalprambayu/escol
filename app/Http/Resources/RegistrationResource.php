<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegistrationResource extends JsonResource
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
            'Email' => $this->Email,
            'Handphone' => $this->Handphone,
            'School_Origin' => $this->School_Origin,
            'Class' => $this->Class,
            'Major' => $this->Major,
            'Package' => $this->Package,
        ];
    }
}
