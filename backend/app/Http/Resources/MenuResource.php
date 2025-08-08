<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // The $this->resource will be an array containing 'settings' and 'menus'
        // that we pass from the controller.
        $settings = $this->resource['settings'];
        $menus = $this->resource['menus'];

        return [
            
            'settings' => [
                'logo_url' => asset($settings->logo_path),
                'consultancy_text' => $settings->consultancy_text,
                'phone_number' => $settings->phone_number,
                'background_color' => $settings->background_color,
            ],
            'menu_items' => $menus->map(function ($menu) {
                return [
                    'label' => $menu->label,
                    'link' => $menu->link,
                ];
            }),
        ];
    }
}    
