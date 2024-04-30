<?php

namespace App\Http\Controllers\Interfaces;

use App\Http\Requests\UserRequest;
use App\Services\RoleServices\RolesServices;
use App\Services\UserServices\UserServices;
use Illuminate\Http\Request;

interface UserControllerInterfaces
{
    public function __construct(UserServices $userServices,RolesServices $rolesServices);

    public function index(Request $request);

    public function create();

    public function store(UserRequest $request);

    public function edit($id);

    public function update(Request $request,$id);

    public function delete($id);
}
