<?php

namespace App\Repositories;

use App\Models\Person;
use App\Models\PhoneBook;

class PersonRepository extends Repository
{
    use Conditions\Conditions;
    use Conditions\Person;

    public function __construct(protected Person $model)
    {

    }

    /**
     * Add new contact 
     */
    public function addContact(int $person, PhoneBook $phoneBook)
    {
        $model = $this->find($person);
        $model->contacts()->save($phoneBook);
    }

    /**
     * Update
     * @param int $person
     * @expected {
     *      
     * }
     */
    public function updateContact(int $person, array $phoneBook)
    {
        $model = $this->find($person);

        $contact = $model->contacts->filter(fn($contact) => $contact->id == $phoneBook['id'])->first();

        foreach ($phoneBook as $key => $value) {
            $contact->$key = $value;
        }

        $contact->save();
    }
}