<?php

namespace App\Services\Filters\Elements;

use App\Services\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class MediaFilters extends Filters
{
    /**
     * @param $value
     * @return Builder
     */
    public function sort($value): Builder
    {
        if (!in_array($value, ['asc', 'desc']))
            $value = 'desc';

        return $this->builder->orderBy('id', $value);
    }
}
