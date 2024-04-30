<?php

namespace App\Services\RoleServices;

use App\Models\Role;

class RolesServices implements RolesServicesInterfaces
{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->role->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $role = $this->role->orderBy('id');

        $role = $role->paginate(10);
        return $role;
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->role->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $role = $this->role->find($id);
        if ($role) $role->update($param);
        return $role;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $role = $this->role->find($id);
        if ($role) $role->delete($id);
        return $role;
    }
}
