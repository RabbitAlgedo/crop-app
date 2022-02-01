<?php

namespace App\Filters;

class PlaceFilters extends QueryFilter
{
 public function type($place_type) {
     return $this->builder->whereIn('place_type', $this->paramToArray($place_type));
 }
}
