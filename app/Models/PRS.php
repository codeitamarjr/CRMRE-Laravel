<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRS extends Model
{
    protected $table = 'prs';
    use HasFactory;

    // One PRS has many users
    public function users()
    {
        return $this->hasMany(User::class, 'prs_code', 'prs_code');
    }

    // One PRS has many clients
    public function clients()
    {
        return $this->hasMany(Clients::class, 'prs_code', 'prs_code');
    }
}