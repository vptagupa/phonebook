<?php

namespace App\Repositories;

use App\Models\PhoneBook;

class ContactRepository extends Repository
{
    use Conditions\Conditions;
    use Conditions\Contact;

    public function __construct(protected PhoneBook $model)
    {

    }
}