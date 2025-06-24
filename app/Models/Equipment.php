<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'equipment_category_id',
        'name',
        'model',
        'serial_number',
        'purchase_date',
        'condition',
        'location',
        'status',
        'image',
        'notes',
    ];

    /**
     * Get the category that this equipment belongs to.
     */
    public function category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'equipment_category_id');
    }

    /**
     * Optional: Access full image URL
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
