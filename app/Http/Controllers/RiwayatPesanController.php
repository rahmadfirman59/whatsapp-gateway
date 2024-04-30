<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\RiwayatPesanControllerInterfaces;
use App\Services\BlastPesanServices\BlastPesanServices;
use Illuminate\Http\Request;

class RiwayatPesanController extends Controller implements RiwayatPesanControllerInterfaces
{
    protected $blastPesanServices;
    public function __construct(BlastPesanServices $blastPesanServices)
    {
        $this->blastPesanServices = $blastPesanServices;
    }

    public function index(Request $request)
    {
        $data = $this->blastPesanServices->search($request);

        return view('riwayat.index')
            ->with('data',$data);
        // TODO: Implement index() method.
    }
}
