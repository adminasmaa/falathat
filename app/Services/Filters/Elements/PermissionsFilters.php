<?php

namespace App\Services\Filters\Elements;

use App\Services\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class PermissionsFilters extends Filters
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
    public function module($value): Builder
    {
        return $this->builder->where('module', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     * @return Builder
     */
    public function niceName($value): Builder
    {
        return $this->builder->whereHas('translations', function ($user) use ($value) {
            $user->where('nice_name', 'like', '%' . $value . '%');
        });
    }

    /**
     * @param $value
     * @return Builder
     */
    public function description($value): Builder
    {
        return $this->builder->whereHas('translations', function ($user) use ($value) {
            $user->where('activity_description', 'like', '%' . $value . '%');
        });
    }
}
