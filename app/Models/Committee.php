<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Committee extends Model
{
    use HasFactory, Translatable, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'committees';

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title',
        'brief'
    ];

    /**
     * @return HasMany
     */
    public function members()
    {
        return $this->hasMany(CommitteeMember::class);
    }
}
