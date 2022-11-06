<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'status',
        'name',
        'address',
        'city',
        'country',
        'website',
        'email',
        'phone',
        'logo',
        'description',
        'email_code',
        'prs_code',
        'client_code',
        'property_code',
    ];

    // Many properties belong to one client
    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_code', 'client_code');
    }

    // One property has many units
    public function units()
    {
        return $this->hasMany(Units::class, 'property_code', 'property_code');
    }
}