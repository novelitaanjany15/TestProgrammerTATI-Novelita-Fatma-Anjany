<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogHarian;
use App\Models\Pegawai;

class LogHarianController extends Controller
{
    /**
     * Dashboard Utama (Web)
     */
    public function dashboard() {
        $current_user_id = 1; // ID Atasan (misal Kepala Dinas)
        $data['pending'] = LogHarian::where('status', 'Pending')->count();
        $data['approved'] = LogHarian::where('status', 'Disetujui')->count();
        $data['rejected'] = LogHarian::where('status', 'Ditolak')->count();

        // Menampilkan log milik bawahan untuk diverifikasi
        $data['logsBawahan'] = LogHarian::with('pegawai')
            ->whereHas('pegawai', function($q) use ($current_user_id) {
                $q->where('atasan_id', $current_user_id);
            })->where('status', 'Pending')->latest()->get();

        return view('dashboard', $data);
    }

    /**
     * GET: Daftar Log (Web & API)
     */
    public function index(Request $request) {
        $logs = LogHarian::with('pegawai')->latest()->get();

        if ($request->expectsJson()) {
            return response()->json($logs, 200);
        }
        return view('log.index', compact('logs'));
    }

    /**
     * POST: Simpan Log Baru (Web & API)
     */
    public function store(Request $request) {
        // 1. Validasi Input
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id', // Memastikan ID ada di tabel pegawai
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|min:10',
        ]);

        // 2. Simpan Data Dinamis (Mengambil dari Request Postman/Form)
        $log = LogHarian::create([
            'pegawai_id' => $request->pegawai_id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'status' => $request->status ?? 'Pending' // Jika status tidak dikirim, otomatis Pending
        ]);

        // 3. Respon API atau Web
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Log harian berhasil dibuat!',
                'data' => $log
            ], 201);
        }

        return redirect()->route('log.index')->with('success', 'Log berhasil dikirim!');
    }

    /**
     * POST/PUT: Verifikasi Status (Web & API)
     */
    public function verifikasi(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak',
            'catatan_atasan' => 'nullable|string'
        ]);

        $log = LogHarian::findOrFail($id);
        $log->update([
            'status' => $request->status,
            'catatan_atasan' => $request->catatan_atasan
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Status log berhasil diperbarui!',
                'data' => $log
            ]);
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    /**
     * DELETE: Hapus Log (Web & API)
     */
    public function destroy(Request $request, $id) {
        $log = LogHarian::findOrFail($id);
        $log->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Log berhasil dihapus!'
            ]);
        }

        return redirect()->route('log.index')->with('success', 'Log berhasil dihapus!');
    }
}
