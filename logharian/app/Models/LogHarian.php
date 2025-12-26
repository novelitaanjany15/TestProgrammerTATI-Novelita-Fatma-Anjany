<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogHarian extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk mencocokkan dengan nama tabel di database Anda
    protected $table = 'log_harian';

    protected $fillable = ['pegawai_id', 'tanggal', 'kegiatan', 'status', 'catatan_atasan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
