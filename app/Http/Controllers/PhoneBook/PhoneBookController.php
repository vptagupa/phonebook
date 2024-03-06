<?php

namespace App\Http\Controllers\PhoneBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use App\Repositories\PersonRepository;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function __construct(private PersonRepository $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->render('PhoneBook/Index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {

        $this->repository->create($request->safe()->only(['name', 'email', 'address']));
    }

    /**
     * Display the specified resource.
     */
    public function list(Request $request)
    {
        return PersonResource::collection(
            $this->repository->list(
                query: [
                    'name' => $request->get('query'),
                    'contacts_count' => true
                ],
                paginate: true,
                perPage: $request->get('per_page')
            )
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $this->repository->update(
            $request->safe()->only(['name', 'email', 'address']),
            $person->id
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Person $person)
    {
        $this->repository->delete($person->id);
    }
}
