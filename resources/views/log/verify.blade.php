@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-4">Verifikasi Log Bawahan</h2>

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nama Pegawai</th>
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Aktivitas</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td class="border px-4 py-2">{{ $log->user->name }}</td>
                    <td class="border px-4 py-2">{{ $log->created_at->format('d M Y') }}</td>
                    <td class="border px-4 py-2">{{ $log->aktivitas }}</td>
                    <td class="border px-4 py-2 font-semibold">{{ $log->status }}</td>
                    <td class="border px-4 py-2">
                        @if ($log->status === 'Pending')
                        <form method="POST" action="{{ route('logs.updateStatus', $log) }}" class="flex gap-2">
                            @csrf
                            <input type="hidden" name="status" value="Disetujui">
                            <button type="submit" class="bg-green-600 text-white px-2 py-1 rounded">Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('logs.updateStatus', $log) }}">
                            @csrf
                            <input type="hidden" name="status" value="Ditolak">
                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded">Tolak</button>
                        </form>
                        @else
                            <span class="text-gray-500">Sudah Diverifikasi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Tidak ada log untuk diverifikasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
