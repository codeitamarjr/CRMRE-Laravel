<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
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
            $query->where('Profiles.name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Profiles.surname', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Profiles.email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Profiles.phone', 'like', '%' . $filters['search'] . '%')
                ->orWhere('Profiles.employment_sector', 'like', '%' . $filters['search'] . '%');
        }
    }

    // Relationship to PRS (one to one)
    public function prs()
    {
        return $this->belongsTo(PRS::class, 'prs_code', 'prs_code');
    }
}
