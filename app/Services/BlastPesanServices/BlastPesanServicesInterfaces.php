<?php

namespace App\Services\BlastPesanServices;

use App\Models\BlastPesan;
use Illuminate\Http\Request;

interface BlastPesanServicesInterfaces
{

    public function __construct(BlastPesan $blastPesan);

    public function search($param);

    public function create($param);
}
