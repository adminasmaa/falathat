<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory, HasUploads, Translatable, Filterable;

    /**
     * Member Types
     */
    public const BOD_MEMBER = 0, COMMITTEE_MEMBER = 1;

    /**
     * Member Types
     */
    public const TYPES = [
        self::BOD_MEMBER => 'Board of Directors',
        self::COMMITTEE_MEMBER => 'Committee',
    ];

    /**
     * @var string
     */
    protected $tablel = 'members';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'phone',
        'email',
        'membership_number',
        'type',
        'CEO'
    ];

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'name',
        'job_description'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['image'];

    /**
     * @var string[]
     */
    protected $casts = [
        'CEO' => 'boolean'
    ];
}
