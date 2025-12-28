<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller {

    /**
     * FUNGSI KHUSUS: Sinkronisasi data dari wilayah.id
     * Akses: GET /api/provinsi/sync
     */
    public function sync() {
        try {
            $response = Http::get('https://wilayah.id/api/provinces.json');
            $data = $response->json()['data'];

            foreach ($data as $item) {
                // Kita gunakan 'id' untuk menyimpan 'code' dari API wilayah.id
                Provinsi::updateOrCreate(
                    ['id' => $item['code']],
                    ['nama' => $item['name']]
                );
            }

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disinkronkan dari wilayah.id',
                'count'   => count($data)
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * GET /api/provinsi
     */
    public function index() {
        $provinsi = Provinsi::orderBy('nama', 'asc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data provinsi berhasil diambil',
            'data'    => $provinsi
        ], 200);
    }

    /**
     * POST /api/provinsi
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'id'   => 'required|string|size:2|unique:provinsis,id', // Harus 2 karakter sesuai kode wilayah
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        $provinsi = Provinsi::create($request->only(['id', 'nama']));

        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil ditambahkan',
            'data'    => $provinsi
        ], 201);
    }

    /**
     * GET /api/provinsi/{id}
     */
    public function show($id) {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $provinsi], 200);
    }

    /**
     * PUT /api/provinsi/{id}
     */
    public function update(Request $request, $id) {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $provinsi->update($request->only('nama'));

        return response()->json([
            'success' => true,
            'message' => 'Data provinsi berhasil diperbarui',
            'data'    => $provinsi
        ], 200);
    }

    /**
     * DELETE /api/provinsi/{id}
     */
    public function destroy($id) {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        $provinsi->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus'], 200);
    }
}
