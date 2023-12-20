<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class FrontMember extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUploads, Filterable;

    /**
     * Member Types
     */
    public const EMPLOYEE_MEMBER = 1, BENEFICIARY_MEMBER = 2, NURSERY_MEMBER = 3, MANAGER_MEMBER = 4;

    /**
     * Member Types
     */
    public const TYPES = [
        self::EMPLOYEE_MEMBER => 'Employee',
        self::BENEFICIARY_MEMBER => 'Beneficiary',
        self::NURSERY_MEMBER => 'Nursery',
        self::MANAGER_MEMBER => 'Manager',
    ];

    /**
     * @var string
     */
    protected $tablel = 'front_members';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_en',
        'name_ar',
        'verified_at',
        'password',
        'image',
        'national_id',
        'phone',
        'phone_code',
        'email',
        'birthdate',
        'sex',
        'currency',
        'work_place',
        'membership_number',
        'address',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['image'];
}
