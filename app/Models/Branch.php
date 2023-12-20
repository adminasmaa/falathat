<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory, Translatable, HasUploads, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'branches';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'location',
        'parent'
    ];

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title',
        'description',
        'achievements',
        'rates',
        'main_phone',
        'secondary_phone',
        'address',
        'work_days',
        'work_time',
        'holiday'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['image'];

    /**
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Branch::class, 'parent');
    }

    /**
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(Branch::class, 'parent');
    }
}
