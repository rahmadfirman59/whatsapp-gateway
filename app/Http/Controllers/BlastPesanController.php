<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\BlastPesanControllerInterfaces;
use App\Imports\BlastPesanImport;
use App\Services\BlastPesanServices\BlastPesanServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class BlastPesanController extends Controller implements BlastPesanControllerInterfaces
{

    protected $blasetPesanService;

    public function __construct(BlastPesanServices $blasetPesanService)
    {
        $this->blasetPesanService = $blasetPesanService;
    }

    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.

        return view('blast-pesan.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {

        // TODO: Implement store() method.
        return $request;
        $this->blasetPesanService->create($request->all());
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function import(Request $request)
    {

        $phone = array();
        $isi = array();
        $data = Excel::toCollection(new BlastPesanImport,$request->file('file'));



        foreach ($data[0] as $item)
        {
            $dt_phone = $item["telepon"];
            $dt_isi = $item["isi"];
            array_push($phone,$dt_phone);
            array_push($isi,$dt_isi);
        }
        return view('blast-pesan.process')
            ->with('phone',$phone)
            ->with('isi',$isi);
    }
}
