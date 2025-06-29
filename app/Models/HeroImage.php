<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    /** @use HasFactory<\Database\Factories\HeroImageFactory> */
    use HasFactory;

    protected $fillable = [
        'name','image', 'link'
    ];
}
