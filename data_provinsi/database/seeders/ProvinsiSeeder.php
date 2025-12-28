<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; // Pastikan ini ada
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder // Bungkus di dalam Class
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil data dari wilayah.id sesuai referensi soal
        $response = Http::get('https://wilayah.id/api/provinces.json');

        // Ambil array 'data' dari response JSON
        $provinces = $response->json()['data'];

        foreach ($provinces as $item) {
            Provinsi::create([
                'code' => $item['code'],
                'name' => $item['name']
            ]);
        }
    }
}
