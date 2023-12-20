<?php

namespace App\Services\Filters\Elements;

use App\Services\Filters\Filters;
use Illuminate\Database\Eloquent\Builder;

class MessagesFilter extends Filters
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
    public function type($value): Builder
    {
        return $this->builder->where('contact_type', $value);
    }

    /**
     * @param $value
     * @return Builder
     */
    public function message($value): Builder
    {
        return $this->builder->where('message', 'like', '%' . $value . '%');
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
