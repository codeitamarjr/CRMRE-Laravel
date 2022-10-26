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
        'prs_code',
        'client_code',
        'property_code',
    ];

    /**
     * Get the client that owns the property.
     * (many properties to one client) where the client_code is the foreign key 
     */
    public function client(){
        return $this->belongsTo(Clients::class, 'client_code', 'client_code');
    }
}
