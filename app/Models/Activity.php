<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use App\Services\Traits\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, Translatable, HasUploads, Filterable;

    /**
     * Member Types
     */
    public const ACTIVITY = 0, NEWS = 1;

    /**
     * Member Types
     */
    public const TYPES = [
        self::ACTIVITY => 'Activity',
        self::NEWS => 'News',
    ];

    /**
     * @var string
     */
    protected $table = 'activities';

    /**
     * @var string[]
     */
    protected $fillable = [
        'thumbnail',
        'image',
        'type'
    ];

    /**
     * @var string[]
     */
    protected $translatable_attributes = [
        'title',
        'description',
        'author'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['thumbnail', 'image'];

    /**
     * @param $value
     * @return array|string|string[]
     */
    public static function DataFormat(Carbon $value, $withYear = false)
    {
        $monthsInArabic = [
            '01' => 'يناير',
            '02' => 'فبراير',
            '03' => 'مارس',
            '04' => 'ابريل',
            '05' => 'مايو',
            '06' => 'يونيو',
            '07' => 'يوليو',
            '08' => 'أغسطس',
            '09' => 'سبتمبر',
            '10' => 'أكتوبر',
            '11' => 'نوفمبر',
            '12' => 'ديسمبر'
        ];

        return str_replace(
            array_keys($monthsInArabic),
            array_values($monthsInArabic),
            $value->format(($withYear ? 'd m Y' : 'd m'))
        );
    }
}
