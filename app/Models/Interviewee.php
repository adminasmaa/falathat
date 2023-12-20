<?php

namespace App\Models;

use App\Services\Traits\HasUploads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interviewee extends Model
{
    use HasFactory, HasUploads;

    /**
     * @var string
     */
    protected $tablel = 'interviewees';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_en',
        'name_ar',
        'image',
        'phone',
        'phone_code',
        'email',
        'birthdate',
        'address',
        'type',
        'CV',
        'job_id'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['CV'];

    /**
     * @return BelongsTo
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
