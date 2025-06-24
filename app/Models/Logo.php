<?php

// app/Models/Logo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slogan',
        'primary_phone',
        'secondary_phone',
        'email',
        'address',
        'map_embed_url',
        'logo_image',
        'favicon',
        'vision',
        'mission',
        'social_links',
        'copyright_text',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'social_links' => 'array',
    ];
}