<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model
{
    use HasFactory;

    protected $fillable = [
        'prs_code',
        'property_code',
        'name',
        'subject',
        'body',
    ];

    // Relationship with PRS by (prs_code)
    public function prs()
    {
        return $this->belongsTo(PRS::class, 'prs_code', 'prs_code');
    }

    // Relationship with Properties by (property_code)
    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_code', 'property_code');
    }
}