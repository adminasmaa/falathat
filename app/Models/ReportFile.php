<?php

namespace App\Models;

use App\Services\Traits\Filterable;
use App\Services\Traits\HasUploads;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportFile extends Model
{
    use HasFactory, HasUploads, Filterable;

    /**
     * @var string
     */
    protected $tablel = 'report_files';

    /**
     * @var string[]
     */
    protected $fillable = [
        'report_id',
        'file'
    ];

    /**
     * @var string[]
     */
    protected static $uploads = ['file'];

    /**
     * @return BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Append type to current file.
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            get: function () {
                $extension = explode('.', $this->file)[1];
                return match ($extension) {
                    'pdf' => 'pdf',
                    'txt' => 'text-file',
                    'docx', 'doc' => 'word',
                    default => 'text-file'
                };
            }
        );
    }
}
