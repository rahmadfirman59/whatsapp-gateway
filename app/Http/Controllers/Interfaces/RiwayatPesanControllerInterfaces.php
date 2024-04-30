<?php

namespace App\Http\Controllers\Interfaces;

use App\Services\BlastPesanServices\BlastPesanServices;
use Illuminate\Http\Request;

interface RiwayatPesanControllerInterfaces
{

    public function __construct(BlastPesanServices $blastPesanServices);

    public function index(Request $request);
}
