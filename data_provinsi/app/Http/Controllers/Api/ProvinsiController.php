<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller {
    public function index() {
        return response()->json(Provinsi::all(), 200);
    }

    public function store(Request $request) {
        $data = Provinsi::create($request->all());
        return response()->json($data, 201);
    }

    public function show($id) {
        $data = Provinsi::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {
        $data = Provinsi::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        $data->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id) {
        $data = Provinsi::find($id);
        if (!$data) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        $data->delete();
        return response()->json(['message' => 'Berhasil dihapus'], 200);
    }
}
