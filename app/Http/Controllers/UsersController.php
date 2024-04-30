<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\UserControllerInterfaces;
use App\Http\Requests\UserRequest;
use App\Services\RoleServices\RolesServices;
use App\Services\UserServices\UserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller implements UserControllerInterfaces
{
    protected $userServices,$rolesServices;

    public function __construct(UserServices $userServices, RolesServices $rolesServices)
    {
        $this->userServices = $userServices;
        $this->rolesServices = $rolesServices;
    }

    public function index(Request $request)
    {
        $data = $this->userServices->search($request);

        return view('user.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
        $roles = $this->rolesServices->search([]);

        return view('user.create')
            ->with('roles',$roles);
    }

    public function store(UserRequest $request)
    {
        // TODO: Implement store() method.
        $password = Hash::make($request->input("password"));
        $request->merge(["password"=> $password ]);

        $this->userServices->create($request->all());

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('users')
            ->with('message', $message);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $roles = $this->rolesServices->search([]);
        $data = $this->userServices->find($id);

        return view('user.edit')
            ->with('roles',$roles)
            ->with('data',$data);
    }

    public function update(Request $request, $id)
    {

        // TODO: Implement update() method.
        $password = $request->input('password') ?? "";

        if ($password)
        {
            $request->merge(["password" => Hash::make($password)]);
            $this->userServices->update($request->all(),$id);
        }else{
            $this->userServices->update($request->only(['name',"email","role_id"]),$id);
        }

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('users')
            ->with('message', $message);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->userServices->delete($id);
        $message = array('type' => "success", 'content' => "Data Berhasil dihapus");
        return redirect()->route('users')
            ->with('message', $message);
    }
}
