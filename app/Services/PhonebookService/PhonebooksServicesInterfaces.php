<?php

namespace App\Services\PhonebookService;

use App\Models\Phonebook;

interface PhonebooksServicesInterfaces
{

    public function __construct(Phonebook $phonebook);

    public function find($value,$column = 'id');

    public function search($param);

    public function create($param);

    public function update($param,$id);

    public function delete($id);

}
