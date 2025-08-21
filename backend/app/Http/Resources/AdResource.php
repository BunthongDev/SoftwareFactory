<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // This creates the full URL for the image
            'image_url' => $this->image_url ? asset('upload/' . $this->image_url) : null,
            'link_url' => $this->link_url,
            'placement' => $this->placement,
        ];
    }
}
