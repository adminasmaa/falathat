<?php

namespace App\Models;

use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Translatable, HasUploads;

    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var string[]
     */
    protected $fillable = ['key', 'col', 'type', 'section'];

    /**
     * @var string[]
     */
    protected $translatable_attributes = ['value'];

    /**
     * @var string[]
     */
    protected static $uploads = ['value'];
}
