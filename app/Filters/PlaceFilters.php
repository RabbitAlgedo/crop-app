<?php

namespace App\Filters;

class PlaceFilters extends QueryFilter
{
    public function type($place_type) {
     return $this->builder->whereIn('place_type', $this->paramToArray($place_type));
    }

    public function user_id($user_id) {
        return $this->builder->whereIn('user_id', $this->paramToArray($user_id));
    }
}
