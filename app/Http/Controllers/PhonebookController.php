<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PhonebookControllerInterfaces;
use App\Http\Requests\PhonebookRequest;
use App\Services\PhonebookService\PhonebookServices;
use Illuminate\Http\Request;

class PhonebookController extends Controller implements PhonebookControllerInterfaces
{
    protected $phonebookServices;
    public function __construct(PhonebookServices $phonebookServices)
    {
        $this->phonebookServices = $phonebookServices;
    }

    public function index(Request $request)
    {
        // TODO: Implement index() method.
        $data = $this->phonebookServices->search($request);

        return view('phonebook.index')
            ->with('data',$data);
    }

    public function create()
    {
        // TODO: Implement create() method.
        return view('phonebook.create');
    }

    public function store(PhonebookRequest $request)
    {
        // TODO: Implement store() method.

        $this->phonebookServices->create($request->all());

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('phonebooks')
            ->with('message', $message);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $data = $this->phonebookServices->find($id);

        return view('phonebook.edit')
            ->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.

        $this->phonebookServices->update($request->all(),$id);

        $message = array('type' => "success", 'content' => "Data Berhasil Disimpan");
        return redirect()->route('phonebooks')
            ->with('message', $message);
    }


    public function delete($id)
    {
        // TODO: Implement delete() method.

        $this->phonebookServices->delete($id);
        $message = array('type' => "success", 'content' => "Data Berhasil Dihapus]
        ");
        return redirect()->route('phonebooks')
            ->with('message', $message);
    }
}
