<?php

namespace App\Services\UserServices;

use App\Models\User;

class UserServices implements UserServicesInterfaces
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function find($value, $column = 'id')
    {
        return $this->user->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $user = $this->user->orderBy('id');
        $user = $user->with(['roles']);

        $name = $param['name'] ?? "";
        if ($name !== '') $user->where('name','like',"$name%");

        $email = $param['email'] ?? "";
        if ($email !== '') $user->where('email','like',"$email%");

        $user = $user->paginate(10);
        return $user;
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->user->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.

        $user = $this->user->find($id);

        if ($user) $user->update($param);
        return $user;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $user = $this->user->find($id);
        if ($user) $user->delete($id);
        return $user;
    }
}
