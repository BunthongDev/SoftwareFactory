<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'category',
        'tags',
        'image',
        'excerpt',
        'content',
        'author_name',
        'author_avatar',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    //This tells Laravel to automatically convert the published_at column into a proper date object every time we fetch a blog post.
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
