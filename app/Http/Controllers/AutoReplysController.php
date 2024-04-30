<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\AutoReplyControllerInterfaces;
use App\Http\Requests\AutoReplyRequest;
use App\Services\AutoReplyServices\AutoReplyServices;
use Illuminate\Http\Request;

class AutoReplysController extends Controller implements AutoReplyControllerInterfaces
{
    protected $autoReplyServices;
    public function __construct(AutoReplyServices $autoReplyServices)
    {
        $this->autoReplyServices = $autoReplyServices;
    }
    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->autoReplyServices->search($request);

        return view('autoreply.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.

        return view('autoreply.create');

    }

    public function store(AutoReplyRequest $request)
    {
        // TODO: Implement store() method.
        $this->autoReplyServices->create($request->all());
        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('autoreplys')
            ->with('message', $message);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.

        $data = $this->autoReplyServices->find($id);
        return view('autoreply.edit')
            ->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
        $this->autoReplyServices->update($request->all(),$id);

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('autoreplys')
            ->with('message', $message);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->autoReplyServices->delete($id);
        $message = array('type' => "success", 'content' => "Data Berhasil Dihapus");
        return redirect()->route('autoreplys')
            ->with('message', $message);
    }


}
