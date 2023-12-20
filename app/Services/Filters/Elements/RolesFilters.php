<?php

namespace App\Services\Filters\Elements;

use App\Services\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class RolesFilters extends Filters
{
    /**
     * @param $value
     * @return Builder
     */
    public function name($value): Builder
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     * @return Builder
     */
    public function status($value): Builder
    {
        return $this->builder->whereIn('status', (is_array($value) ? $value : []));
    }
}
