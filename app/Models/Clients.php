<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'city',
        'country',
        'website',
        'phone',
        'logo',
        'prs_code',
        'client_code',
    ];

    /**
     * Get the properties for the client.
     * (one client to many properties) where the client_code is the foreign key
     */
    public function properties()
    {
        return $this->hasMany(Properties::class, 'client_code', 'client_code');
    }
}
