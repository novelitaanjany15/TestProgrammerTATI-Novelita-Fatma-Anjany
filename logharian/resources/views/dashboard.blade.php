@extends('layout.app')

@section('content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Dashboard Log Harian</h1>
    <div class="flex items-center space-x-2 text-sm text-slate-500 mt-1">
        <span>Beranda</span>
        <span>/</span>
        <span class="text-blue-600 font-medium">Statistik Ringkasan</span>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-amber-100 text-amber-600 rounded-xl group-hover:scale-110 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-xs font-bold text-amber-500 uppercase tracking-wider">Status</span>
        </div>
        <h3 class="text-slate-500 text-sm font-medium uppercase">Pending</h3>
        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $pending }}</p>
        <p class="text-xs text-slate-400 mt-2">Menunggu Verifikasi</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-xl group-hover:scale-110 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-xs font-bold text-emerald-500 uppercase tracking-wider">Verified</span>
        </div>
        <h3 class="text-slate-500 text-sm font-medium uppercase">Disetujui</h3>
        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $approved }}</p>
        <p class="text-xs text-slate-400 mt-2">Log Telah Disetujui</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="p-3 bg-rose-100 text-rose-600 rounded-xl group-hover:scale-110 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-xs font-bold text-rose-500 uppercase tracking-wider">Rejected</span>
        </div>
        <h3 class="text-slate-500 text-sm font-medium uppercase">Ditolak</h3>
        <p class="text-3xl font-bold text-slate-800 mt-1">{{ $rejected }}</p>
        <p class="text-xs text-slate-400 mt-2">Perlu Revisi Log</p>
    </div>

    <div class="bg-blue-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="text-blue-100 text-sm font-medium uppercase">Total Bawahan</h3>
            <p class="text-3xl font-bold mt-1">4</p>
            <p class="text-xs text-blue-200 mt-2">Dalam Struktur Anda</p>
        </div>
        <svg class="absolute right-[-10px] bottom-[-10px] h-24 w-24 text-blue-500 opacity-50" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
        </svg>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-6 border-b border-slate-50 flex justify-between items-center">
            <h2 class="text-lg font-bold text-slate-800">Verifikasi Log Bawahan</h2>
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full">Butuh Tindakan</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-400 text-[10px] uppercase tracking-widest font-bold">
                    <tr>
                        <th class="px-6 py-4">Pegawai</th>
                        <th class="px-6 py-4">Kegiatan</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    {{-- Loop data log yang statusnya Pending dari bawahan di sini --}}
                    @forelse($logsBawahan as $lb)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-500">
                                    {{ substr($lb->pegawai->nama, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold text-slate-700">{{ $lb->pegawai->nama }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-500">{{ Str::limit($lb->kegiatan, 40) }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('log.verifikasi', $lb->id) }}" method="POST" class="flex space-x-2">
                                @csrf
                                <input type="hidden" name="status" value="Disetujui">
                                <button type="submit" class="p-2 bg-emerald-50 text-emerald-600 rounded-lg hover:bg-emerald-600 hover:text-white transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-slate-400 italic">Tidak ada log bawahan yang menunggu verifikasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-6">Aktivitas Terbaru</h2>
        <div class="space-y-6 relative">
            <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-slate-100"></div>

            <div class="relative pl-10">
                <div class="absolute left-2 top-1 h-4 w-4 rounded-full bg-blue-500 border-4 border-white shadow-sm"></div>
                <p class="text-sm font-semibold text-slate-800 leading-none">Kepala Bidang 1</p>
                <p class="text-xs text-slate-500 mt-1">Menginput log harian baru</p>
                <p class="text-[10px] text-slate-400 mt-1 italic">2 menit yang lalu</p>
            </div>

            <div class="relative pl-10 text-slate-400">
                <div class="absolute left-2 top-1 h-4 w-4 rounded-full bg-slate-300 border-4 border-white shadow-sm"></div>
                <p class="text-sm font-medium leading-none">Staff A</p>
                <p class="text-xs mt-1 italic">Belum menginput log hari ini</p>
            </div>
        </div>
    </div>
</div>
@endsection
