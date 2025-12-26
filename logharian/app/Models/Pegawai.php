<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk memberitahu Laravel nama tabel yang benar
    protected $table = 'pegawai';

    protected $fillable = ['nama', 'jabatan', 'atasan_id'];

    // Relasi ke Bawahan
    public function bawahan()
    {
        return $this->hasMany(Pegawai::class, 'atasan_id');
    }

    // Relasi ke Atasan
    public function atasan()
    {
        return $this->belongsTo(Pegawai::class, 'atasan_id');
    }
}
