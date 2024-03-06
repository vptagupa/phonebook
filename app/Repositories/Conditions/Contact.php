<?php

namespace App\Repositories\Conditions;

trait Contact
{
    public function personIdCondition(&$builder, $query)
    {
        return $builder->when(isset($query['person_id']) && $query['person_id'], function ($builder) use ($query) {
            $builder->where('person_id', $query['person_id']);
        });
    }
}