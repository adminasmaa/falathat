<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory, HasUploads, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'media';

    /**
     * @var string[]
     */
    protected $fillable = [
        'thumbnail',
        'image',
        'video'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = [
        'thumbnail',
        'image'
    ];

    /**
     * Interact with the user's first name.
     */
    protected function video(): Attribute
    {
        return Attribute::make(
            get: fn(null|string $value) => ($value ? "https://www.youtube.com/embed/" . last(explode("/", $value)) : '-')
        );
    }
}
