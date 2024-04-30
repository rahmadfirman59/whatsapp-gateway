<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlastPesan extends Model
{
    use HasFactory;

    protected $table = 'blast_pesan';

    protected $fillable = ['telepon', 'pesan', 'tanggal', 'keterangan'];
}
