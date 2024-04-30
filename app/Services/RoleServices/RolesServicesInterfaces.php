<?php

namespace App\Services\RoleServices;

use App\Models\Role;

interface RolesServicesInterfaces
{

    public function __construct(Role $role );

    public function find($value,$column = 'id');

    public function search($param);

    public function create($param);

    public function update($param,$id);

    public function delete($id);
}
