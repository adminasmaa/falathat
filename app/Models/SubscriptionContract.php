<?php

namespace App\Models;

use App\Services\Traits\HasUploads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscriptionContract extends Model
{
    use HasFactory, HasUploads;

    /**
     * @var string
     */
    protected $tablel = 'subscription_contracts';

    /**
     * @var string[]
     */
    protected $fillable = [
        'subscription_id',
        'file'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['file'];

    /**
     * @return BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
