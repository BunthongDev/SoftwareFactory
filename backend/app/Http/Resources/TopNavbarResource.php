<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopNavbarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // This array will hold the final formatted social links.
        $socialLinks = [];

        // This helper array maps your database columns to the data your frontend needs.
        $socialsConfig = [
            'facebook' => ['label' => 'Facebook', 'icon' => 'FacebookLogoIcon'],
            'linkedin' => ['label' => 'LinkedIn', 'icon' => 'LinkedinLogoIcon'],
            'twitter'  => ['label' => 'X (formerly Twitter)', 'icon' => 'XLogoIcon'],
            'instagram' => ['label' => 'Instagram', 'icon' => 'InstagramLogoIcon'],
            'youtube'  => ['label' => 'YouTube', 'icon' => 'YoutubeLogoIcon'],
            'telegram' => ['label' => 'Telegram', 'icon' => 'TelegramLogoIcon'], // Assuming you have a Telegram icon
        ];

        // Loop through the config to build the social links array.
        foreach ($socialsConfig as $key => $details) {
            // Check if the status for this social link is true (enabled).
            if ($this->{$key . '_status'}) {
                // If it's enabled, add it to the array.
                $socialLinks[] = [
                    'href'  => $this->{$key . '_url'},
                    'label' => $details['label'],
                    'icon'  => $details['icon'], // Pass the icon name for the frontend component
                ];
            }
        }

        // Return the final, structured data.
        return [
            'address' => $this->address,
            'email' => $this->email,
            'social_links' => $socialLinks, // The clean array of enabled social links
        ];
    }
}
