<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    // Define the fillable attributes for mass assignment (Allows mass assignment for these fields when creating/updating sliders.)
    protected $fillable = [
        'heading',
        'description',
        'link',
        'image',
    ];
}
