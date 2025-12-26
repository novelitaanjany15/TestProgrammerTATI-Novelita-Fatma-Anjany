<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data lama
        Pegawai::truncate();

        // Buat 5 pegawai sesuai struktur
        $kepalaDinas = Pegawai::create([
            'nama' => 'Pegawai 1',
            'jabatan' => 'Kepala Dinas',
            'atasan_id' => null,
        ]);

        $kepalaBidang1 = Pegawai::create([
            'nama' => 'Pegawai 2',
            'jabatan' => 'Kepala Bidang 1',
            'atasan_id' => $kepalaDinas->id,
        ]);

        $kepalaBidang2 = Pegawai::create([
            'nama' => 'Pegawai 3',
            'jabatan' => 'Kepala Bidang 2',
            'atasan_id' => $kepalaDinas->id,
        ]);

        Pegawai::create([
            'nama' => 'Pegawai 4',
            'jabatan' => 'Staff',
            'atasan_id' => $kepalaBidang1->id,
        ]);

        Pegawai::create([
            'nama' => 'Pegawai 5',
            'jabatan' => 'Staff',
            'atasan_id' => $kepalaBidang2->id,
        ]);
    }
}
