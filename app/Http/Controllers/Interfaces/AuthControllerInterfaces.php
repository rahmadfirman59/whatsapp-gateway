<?php

namespace App\Http\Controllers\Interfaces;

use App\Http\Requests\LoginRequest;

interface AuthControllerInterfaces
{
    public function login();

    public function doLogin(LoginRequest $request);

    public function logout();
}
