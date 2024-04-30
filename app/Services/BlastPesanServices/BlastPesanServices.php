<?php

namespace App\Services\BlastPesanServices;

use App\Models\BlastPesan;
use Illuminate\Http\Request;

class BlastPesanServices implements BlastPesanServicesInterfaces
{
    protected $blastPesan;
    public function __construct(BlastPesan $blastPesan)
    {
        $this->blastPesan = $blastPesan;
    }


    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->blastPesan->create($param);
    }


    public function search($param)
    {
        // TODO: Implement search() method.
        $blastPesan = $this->blastPesan->orderBy('id','desc');

        $blastPesan =  $blastPesan->paginate(10);

        return $blastPesan;
    }

    public function pesan_per_bulan()
    {
        $bulan = [1,2,3,4,5,6,7,8,9,10,11,12];
        $year = date("Y");

        $data = [];
        foreach ($bulan as $item)
        {
            $pesan = $this->blastPesan->whereYear('tanggal', '=', $year)
                ->whereMonth('tanggal', '=', $item)
                ->get()->count();
            array_push($data,$pesan);
        }

        return $data;
    }

    public function pesan_terikirim()
    {
        $year = date("Y");
        $data = [];
        $terkirim = $this->blastPesan->whereYear('tanggal', '=', $year)
            ->where('keterangan','=',1)
            ->get()->count();

        $tidak = $this->blastPesan->whereYear('tanggal', '=', $year)
            ->where('keterangan','=',0)
            ->get()->count();

        array_push($data,$terkirim);
        array_push($data,$tidak);

        return $data;
    }
}
