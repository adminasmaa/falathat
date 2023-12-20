<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'activity_logs';

    /**
     * @var string[]
     */
    protected $fillable = ['type', 'route', 'old_data', 'changed_data'];

    /**
     * @var string[]
     */
    protected $casts = [
        'old_data' => 'array',
        'changed_data' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
