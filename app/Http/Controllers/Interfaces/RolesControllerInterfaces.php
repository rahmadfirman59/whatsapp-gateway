<?php

namespace App\Http\Controllers\Interfaces;


use App\Http\Requests\RolesRequest;
use App\Services\RoleServices\RolesServices;
use Illuminate\Http\Request;

interface RolesControllerInterfaces
{
    public function __construct(RolesServices $rolesServices);

    public function index(Request $request);

    public function create();

    public function store(RolesRequest $request);

    public function edit($id);

    public function update(Request $request,$id);

    public function delete($id);
}
