<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;

    protected $table = 'phonebooks';

    protected $fillable = [
        'person_id',
        'name',
        'email',
        'contact_no',
        'website',
        'address_1',
        'address_2'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
