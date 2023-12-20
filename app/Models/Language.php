<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory, Translatable, Filterable;

    /**
     * @var string
     */
    protected $table = 'languages';

    /**
     * @var string[]
     */
    protected $fillable = ['code', 'required', 'default'];

    /**
     * @var string[]
     */
    protected $translatable_attributes = ['name'];
}
