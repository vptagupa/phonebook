<?php

namespace App\Http\Requests;

use App\Models\PhoneBook;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:120',
            'email' => [
                'required',
                'string',
                'email',
                'max:120',
                Rule::unique(PhoneBook::class)
            ],
            'contact_no' => 'required',
            'website' => 'nullable',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'person_id' => 'integer'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'person_id' => $this->person->id
        ]);
    }
}
