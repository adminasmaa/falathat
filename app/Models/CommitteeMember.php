<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitteeMember extends Model
{
    use HasFactory, Translatable, HasUploads, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'committee_members';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'membership_number',
        'committee_id'
    ];

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'name'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['image'];

    /**
     * @return BelongsTo
     */
    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }
}
