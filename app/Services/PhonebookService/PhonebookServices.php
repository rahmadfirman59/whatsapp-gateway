<?php

namespace App\Services\PhonebookService;

use App\Models\Phonebook;

class PhonebookServices implements PhonebooksServicesInterfaces
{

    protected $phonebook;
    public function __construct(Phonebook $phonebook)
    {
        $this->phonebook = $phonebook;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->phonebook->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $phonebook = $this->phonebook->orderby('id');

        $name = $param['name'] ?? "";
        if ($name !== '') $phonebook->where('name','like',"%$name%");


        $phonebook =    $phonebook->paginate(10);

        return $phonebook;
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->phonebook->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $phonebook = $this->phonebook->find($id);

        if ($phonebook) $phonebook->update($param);

        return $phonebook;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.

        $phonebook = $this->phonebook->find($id);

        if ($phonebook) $phonebook->delete($id);

        return $phonebook;
    }
}
