<?php

namespace App\Services\Filters\Elements;

use App\Services\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class UsersFilters extends Filters
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
    public function email($value): Builder
    {
        return $this->builder->where('email', 'like', '%' . $value . '%');
    }

    /**
     * @param $value
     * @return Builder
     */
    public function status($value): Builder
    {
        return $this->builder->whereIn('status', (is_array($value) ? $value : []));
    }

    /**
     * @param $value
     * @return Builder
     */
    public function role($value): Builder
    {
        return is_array($value)
            ? $this->builder->whereHas('roles', fn($q) => $q->whereIn('role_id', $value))
            : $this->builder->whereHas('roles', fn($q) => $q->where('role_id', $value));
    }

    /**
     * @param $value
     * @return Builder
     */
    public function date_from($value): Builder
    {
        return $this->builder->whereDate('created_at', '>=', $value);
    }

    /**
     * @param $value
     * @return Builder
     */
    public function date_to($value): Builder
    {
        return $this->builder->whereDate('created_at', '<=', $value);
    }

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
