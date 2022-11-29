<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prs_code',
        'name',
        'surname',
        'username',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // One user belongs to ONE PRS
    public function prs()
    {
        return $this->belongsTo(PRS::class, 'prs_code', 'prs_code');
    }

    //  Relationship to Enquiries( One user can have many enquiries)
    public function enquiries()
    {
        return $this->hasMany(Enquiries::class, 'prs_code', 'prs_code');
    }

    //  Relationship to Applications( One user can have many applications)
    public function applications()
    {
        return $this->hasMany(Applications::class, 'prs_code', 'prs_code');
    }

    //  Relationship to Profiles( One user can have many profiles)
    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'prs_code', 'prs_code');
    }
}
