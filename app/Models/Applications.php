<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    // Relationship to PRS
    public function prs()
    {
        return $this->belongsTo(PRS::class, 'prs_code', 'prs_code');
    }

    // Relationship to Profiles
    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'application_id', 'application_id');
    }
}
