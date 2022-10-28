<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('applications.name', 'like', '%'.$filters['search'].'%')
            ->orWhere('applications.surname', 'like', '%'.$filters['search'].'%')
            ->orWhere('applications.email', 'like', '%'.$filters['search'].'%')
            ->orWhere('applications.phone', 'like', '%'.$filters['search'].'%')
            ->orWhere('applications.employment_sector', 'like', '%'.$filters['search'].'%');
        }
    }
}
