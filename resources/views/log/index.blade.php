@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Log Harian Saya</h2>

    <a href="{{ route('logs.create') }}"
       class="inline-block mb-4 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition">
        + Tambah Log
    </a>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-300 rounded text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Tanggal</th>
                    <th class="px-4 py-2 border border-gray-300">Aktivitas</th>
                    <th class="px-4 py-2 border border-gray-300">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($logs as $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border border-gray-200 whitespace-nowrap">
                            {{ $log->created_at->format('d M Y') }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200">
                            {{ $log->aktivitas }}
                        </td>
                        <td class="px-4 py-2 border border-gray-200 font-semibold">
                            <span class="@if($log->status === 'Disetujui') text-green-600
                                         @elseif($log->status === 'Ditolak') text-red-600
                                         @else text-yellow-600 @endif">
                                {{ $log->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                            Belum ada log yang tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
