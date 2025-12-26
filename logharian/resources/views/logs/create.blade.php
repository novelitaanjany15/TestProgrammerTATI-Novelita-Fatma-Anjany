@extends('layout.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8 border-b border-slate-50">
            <h2 class="text-xl font-bold text-slate-800">Tambah Log Harian</h2>
            <p class="text-slate-500 text-sm">Laporkan kegiatan kerja Anda hari ini.</p>
        </div>
        <form action="{{ route('log.store') }}" method="POST" class="p-8 space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Kegiatan</label>
                <textarea name="kegiatan" rows="4" placeholder="Apa yang Anda kerjakan hari ini?"
                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition outline-none"></textarea>
            </div>
            <div class="flex space-x-3">
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-blue-200">
                    Kirim Log
                </button>
                <a href="{{ route('log.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
