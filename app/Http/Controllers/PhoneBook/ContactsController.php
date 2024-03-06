<?php

namespace App\Http\Controllers\PhoneBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Person;
use App\Models\PhoneBook;
use App\Repositories\ContactRepository;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __construct(private PersonRepository $repository, private ContactRepository $contact)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request, Person $person)
    {
        $this->repository->addContact(
            $person->id,
            new PhoneBook($request->safe()->only([
                'name',
                'email',
                'contact_no',
                'website',
                'address_1',
                'address_2',
            ]))
        );
    }

    public function list(Request $request, Person $person)
    {
        return ContactResource::collection(
            $this->contact->list(
                query: [
                    'person_id' => $person->id,
                    'name' => $request->get('query'),
                ],
                paginate: true,
                perPage: $request->get('per_page'),
            )
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Person $person, PhoneBook $contact)
    {
        $this->repository->updateContact(
            $person->id,
            $request->safe()->only([
                'id',
                'name',
                'email',
                'contact_no',
                'website',
                'address_1',
                'address_2',
            ])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Person $person, PhoneBook $contact)
    {
        $this->contact->delete($contact->id);
    }
}
