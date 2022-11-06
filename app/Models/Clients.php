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

    // Many clients belong to one PRS
    public function prs()
    {
        return $this->belongsTo(PRS::class, 'prs_code', 'prs_code');
    }

    // One client has many properties
    public function properties()
    {
        return $this->hasMany(Properties::class, 'client_code', 'client_code');
    }
}