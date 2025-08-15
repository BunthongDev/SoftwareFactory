<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'logo',
        'slogan',
        'facebook_url',
        'linkedin_url',
        'telegram_url',
        'instagram_url',
        'youtube_url',
        'cta_title',
        'cta_description',
        'cta_button_link',
        'copyright_text',
        'background_color',
        'font_color',
    ];
}
