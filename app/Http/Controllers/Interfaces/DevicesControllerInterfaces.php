<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\Request;

interface DevicesControllerInterfaces
{
    public function index(Request $request);

    public function create();

    public function store(Request $request);

    public function edit($id);

    public function update(Request $request,$id);

    public function delete($id);

}
