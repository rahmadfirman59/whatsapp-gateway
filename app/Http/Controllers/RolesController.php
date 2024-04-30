<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RolesControllerInterfaces;
use App\Http\Requests\RolesRequest;
use App\Services\RoleServices\RolesServices;
use Illuminate\Http\Request;

class RolesController extends Controller implements RolesControllerInterfaces
{
    protected  $rolesServices;
    public function __construct(RolesServices $rolesServices)
    {
        $this->rolesServices = $rolesServices;
    }

    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->rolesServices->search($request);

        return view('roles.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('roles.create');
    }

    public function store(RolesRequest $request)
    {
        // TODO: Implement store() method.

        $menu =json_encode($request->menu);
        $request->merge(['menu'=>$menu]);
        $this->rolesServices->create($request->all());

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('roles')
            ->with('message', $message);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $data = $this->rolesServices->find($id);
        return view('roles.edit')
            ->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $menu =json_encode($request->menu);
        $request->merge(['menu'=>$menu]);

        $this->rolesServices->update($request->all(),$id);
        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('roles')
            ->with('message', $message);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.

        $this->rolesServices->delete($id);
        $message = array('type' => "success", 'content' => "Data Berhasil Dihapus");
        return redirect()->route('roles')
            ->with('message', $message);
    }
}
