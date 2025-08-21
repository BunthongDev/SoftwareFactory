<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'image_url',
        'link_url',
        'placement',
        'is_active',
    ];
}
