<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'prs_code',
        'property_code',
        'type',
        'main_applicant_id',
        'name',
        'surname',
        'dob',
        'pps_number',
        'phone',
        'email',
        'alternative_email',
        'address',
        'city',
        'county',
        'postcode',
        'employment_status',
        'employment_sector',
        'employment_position',
        'employment_company',
        'employment_phone',
        'employment_start_date',
        'income',
        'extra_income',
        'extra_income_source',
        'landlord_name',
        'landlord_phone',
        'preferred_move_out_date',
        'car',
        'pet',
        'pet_breed',
        'children',
        'children_age',
        'HAP',
        'HAP_allowance',
        'notes',
        'waiting_list',
        'status',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('applications.name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('applications.surname', 'like', '%' . $filters['search'] . '%')
                ->orWhere('applications.email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('applications.phone', 'like', '%' . $filters['search'] . '%')
                ->orWhere('applications.employment_sector', 'like', '%' . $filters['search'] . '%');
        }
    }
}
