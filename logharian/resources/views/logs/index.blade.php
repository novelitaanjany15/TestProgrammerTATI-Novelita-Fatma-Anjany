@extends('layout.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800">Daftar Log Harian</h1>
        <p class="text-slate-500 text-sm">Kelola semua laporan kegiatan di sini.</p>
    </div>
    <a href="{{ route('log.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg shadow-blue-200 transition-all flex items-center">
        <span class="mr-2 text-xl">+</span> Tambah Log
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50 border-b border-slate-100 text-slate-500 uppercase text-xs font-bold tracking-widest">
            <tr>
                <th class="p-5">Pegawai</th>
                <th class="p-5">Tanggal</th>
                <th class="p-5">Kegiatan</th>
                <th class="p-5">Status</th>
                <th class="p-5">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($logs as $log)
            <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-5">
                    <div class="flex items-center space-x-3">
                        <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs uppercase">
                            {{ substr($log->pegawai->nama, 0, 1) }}
                        </div>
                        <span class="font-semibold text-slate-700">{{ $log->pegawai->nama }}</span>
                    </div>
                </td>
                <td class="p-5 text-slate-500 text-sm">
                    {{ \Carbon\Carbon::parse($log->tanggal)->translatedFormat('d F Y') }}
                </td>
                <td class="p-5 text-slate-600 text-sm max-w-xs truncate" title="{{ $log->kegiatan }}">
                    {{ $log->kegiatan }}
                </td>
                <td class="p-5">
                    @php
                        $badge = match($log->status) {
                            'Pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                            'Disetujui' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                            'Ditolak' => 'bg-rose-50 text-rose-600 border-rose-100',
                            default => 'bg-slate-50 text-slate-600 border-slate-100'
                        };
                    @endphp
                    <span class="{{ $badge }} border px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                        {{ $log->status }}
                    </span>
                </td>
                <td class="p-5">
                    @if($log->status == 'Pending')
                        <button onclick="openModal('{{ $log->id }}', '{{ $log->pegawai->nama }}')"
                                class="text-blue-600 font-bold text-sm hover:text-blue-800 transition hover:underline focus:outline-none">
                            Verifikasi
                        </button>
                    @else
                        <span class="text-slate-400 italic text-xs">Selesai</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-10 text-center text-slate-400 italic">Belum ada data log harian.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="modalVerifikasi" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity bg-slate-900 bg-opacity-60 backdrop-blur-sm" onclick="closeModal()"></div>

        <div class="relative inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-2xl shadow-2xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 text-center sm:text-left">
                <h3 class="text-lg font-bold text-slate-800">Keputusan Verifikasi</h3>
                <p class="text-sm text-slate-500">Memproses log milik: <span id="modalNamaPegawai" class="font-bold text-blue-600"></span></p>
            </div>

            <form id="formVerifikasi" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block mb-3 text-sm font-semibold text-slate-700">Ubah Status Menjadi:</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="Disetujui" class="sr-only peer" checked>
                                <div class="p-4 text-center border-2 rounded-xl transition-all peer-checked:border-emerald-500 peer-checked:bg-emerald-50 group-hover:bg-slate-50">
                                    <span class="block text-xl mb-1">✅</span>
                                    <span class="text-xs font-bold text-slate-600 uppercase">Setujui</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="status" value="Ditolak" class="sr-only peer">
                                <div class="p-4 text-center border-2 rounded-xl transition-all peer-checked:border-rose-500 peer-checked:bg-rose-50 group-hover:bg-slate-50">
                                    <span class="block text-xl mb-1">❌</span>
                                    <span class="text-xs font-bold text-slate-600 uppercase">Tolak</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-slate-700">Catatan Atasan (Opsional)</label>
                        <textarea name="catatan_atasan" rows="3" class="w-full px-4 py-3 text-sm border border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 outline-none transition" placeholder="Berikan alasan atau instruksi..."></textarea>
                    </div>
                </div>

                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-bold text-slate-400 hover:text-slate-600 transition">Batal</button>
                    <button type="submit" class="px-6 py-2 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Simpan Keputusan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(id, nama) {
        const modal = document.getElementById('modalVerifikasi');
        const form = document.getElementById('formVerifikasi');
        const textNama = document.getElementById('modalNamaPegawai');

        textNama.innerText = nama;
        form.action = `/log/${id}/verifikasi`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modalVerifikasi');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endsection
