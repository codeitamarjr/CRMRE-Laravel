<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_code' ,
        'enquiry_id',
        'prs_code',
        'property_code',
        'contact_name',
        'contact_email',
        'contact_phone',
        'body',
        'title',
        'status',
    ];

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('contact_name', 'like', '%'.$filters['search'].'%')
            ->orWhere('contact_email', 'like', '%'.$filters['search'].'%')
            ->orWhere('contact_phone', 'like', '%'.$filters['search'].'%')
            ->orWhere('title', 'like', '%'.$filters['search'].'%')
            ->orWhere('body', 'like', '%'.$filters['search'].'%');
        }
    }
}
