<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            // 'Video' => $this->Video,
            'Link' => $this->Link,
            'Text1' => $this->Text1,
            'Text2' => $this->Text2,
            'Image' => $this->Image,
        ];
    }
}
