<?php

namespace App\Repositories\Conditions;

trait Person
{
    public function contactsCountCondition(&$builder, $query)
    {
        return $builder->when(isset($query['contacts_count']) && $query['contacts_count'], function ($builder) use ($query) {
            $builder->withCount('contacts');
        });
    }
}