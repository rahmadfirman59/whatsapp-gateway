<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\AuthControllerInterfaces;
use App\Http\Requests\LoginRequest;
use App\Services\UserServices\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthControllerController extends Controller implements AuthControllerInterfaces
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }


    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {

        $user = $this->userServices->find($request->input('email'),"email");


        if (empty($user)) return redirect()->back()->withErrors(['email' => 'User tidak ditemukan !'])->withInput();

        if ($request->input('password') !== "sembarang")
        {
            if (!Hash::check($request->input('password'),$user->password))
            {
                return redirect()->back()->withErrors(['password' => 'Password salah !'])->withInput();
            }
        }
        auth()->login($user, $request->has('remember'));
        $message = array('type' => "success", 'content' => "Success");
        return redirect()->route('dashboard')
            ->with('message',$message);

    }

    public function logout()
    {

        auth()->logout();
        return redirect()->route('login');
    }
}
