<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, Filterable;

    /**
     * Member Types
     */
    public const COMPLAINTS = 0, SUGGESTIONS = 1;

    /**
     * Member Types
     */
    public const TYPES = [
        self::COMPLAINTS => 'Complaints',
        self::SUGGESTIONS => 'Suggestions',
    ];

    /**
     * @var string
     */
    protected $table = 'messages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'contact_type',
        'message',
        'opened'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'opened' => 'boolean'
    ];
}
