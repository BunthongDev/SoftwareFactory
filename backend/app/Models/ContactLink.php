<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLink extends Model
{
      protected $fillable = [
        'title',
        'detail',
        'href',
        'icon_class',
        'hover_color',
        'order',
        'is_visible',
    ];
}
