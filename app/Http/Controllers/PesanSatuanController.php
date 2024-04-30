<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PesanSatuanControllerInterfaces;
use Illuminate\Http\Request;

class PesanSatuanController extends Controller implements PesanSatuanControllerInterfaces
{
    //
    public function index(Request $request)
    {
        // TODO: Implement index() method.
        return view('pesan-satuan.index');
    }
}
