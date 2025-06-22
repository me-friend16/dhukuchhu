<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    /** @use HasFactory<\Database\Factories\LogoFactory> */
    use HasFactory;

    protected $fillable = ['name','phone1','phone2','email','address','map', 'slogan', 'vision', 'mission', 'image'];
}
