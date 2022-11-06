<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_code',
        'property_code',
        'custom_code',
        'type',
        'block',
        'floor',
        'number',
        'bedrooms',
        'postcode',
        'car_spaces',
        'description',
        'date_available',
        'status',
        'created_at',
        'updated_at',
    ];

    // Many units belong to one property
    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_code', 'property_code');
    }
}