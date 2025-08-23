<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'slug' => $this->slug,
            'category' => $this->category,
            'tags' => $this->tags,
            'img' => asset($this->image), // Renamed to match frontend 'img' prop
            'desc' => $this->excerpt, // Renamed to match frontend 'desc' prop
            'content' => $this->content,
            'author' => $this->author_name, // Renamed to match frontend 'author' prop
            'avatar' => asset($this->author_avatar), // Renamed to match frontend 'avatar' prop
            'date' => $this->published_at ? $this->published_at->diffForHumans() : null,

            // add view count (New feature)
            'view_count' => $this->view_count, // The raw number, e.g., 1530
            'formatted_view_count' => $this->formatted_view_count, // The formatted string, e.g., "1.5K"
        ];
    }
}
