<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory, Translatable, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'reports';

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title'
    ];

    /**
     * @return HasMany
     */
    public function files()
    {
        return $this->hasMany(ReportFile::class);
    }
}
