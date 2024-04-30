<?php

namespace App\Http\Controllers;

use App\Services\BlastPesanServices\BlastPesanServices;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected  $blastPesanService;
    public function __construct(BlastPesanServices $blastPesanServices)
    {
        $this->middleware('auth');
        $this->blastPesanService = $blastPesanServices;
    }

    public function dashboard()
    {
        $pesan = $this->blastPesanService->pesan_per_bulan();
        $rasio = $this->blastPesanService->pesan_terikirim();

        return view('dashboard')
            ->with('pesan',$pesan)
            ->with('rasio',$rasio);
    }
}
