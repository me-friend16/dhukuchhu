<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use HasFactory;

    // Optional: specify table name if different
    // protected $table = 'equipment_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    /**
     * Get all equipment under this category.
     */
    public function equipment()
    {
        return $this->hasMany(Equipment::class);
    }
}
