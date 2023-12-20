<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $tablel = 'subscriptions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_en',
        'name_ar',
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
        'type',
        'nominal_shares',
        'administrative_shares',
        'shares_count'
    ];

    /**
     * @return HasMany
     */
    public function contracts()
    {
        return $this->hasMany(SubscriptionContract::class);
    }
}
