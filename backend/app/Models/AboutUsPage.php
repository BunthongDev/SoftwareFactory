<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image1',
        'hero_image2',
        'stat1_number',
        'stat1_label',
        'stat2_number',
        'stat2_label',
        'journey_title',
        'journey_description',
        'team_title',
        'team_description',
    ];
}
