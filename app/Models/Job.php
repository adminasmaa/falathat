<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory, Translatable, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'jobs';

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title',
        'brief',
        'tags'
    ];

    /**
     * @return HasMany
     */
    public function interviewees()
    {
        return $this->hasMany(Interviewee::class);
    }
}
