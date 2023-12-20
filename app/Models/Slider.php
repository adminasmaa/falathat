<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, Translatable, HasUploads, Filterable;

    /**
     * Slider Types
     */
    public const MAIN = 0, SECONDARY = 1;

    /**
     * Slider Positions
     */
    public const RIGHT = 0, MIDDLE = 1, LEFT = 2;

    /**
     * Slider Types
     */
    public const TYPES = [
        self::MAIN => 'Main',
        self::SECONDARY => 'Secondary',
    ];

    /**
     * Slider Positions
     */
    public const POSITIONS = [
        self::RIGHT => 'Right',
        self::MIDDLE => 'Middle',
        self::LEFT => 'Left'
    ];

    /**
     * @var string
     */
    protected $tablel = 'sliders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'image',
        'position',
        'type',
        'icon',
        'color'
    ];

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title',
        'brief',
        'link'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['image'];
}
