@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Input Log Harian</h2>

    <form method="POST" action="{{ route('logs.store') }}">
        @csrf

        <div class="mb-4">
            <label for="aktivitas" class="block text-sm font-medium text-gray-700 mb-1">
                Aktivitas Hari Ini
            </label>
            <textarea
                name="aktivitas"
                id="aktivitas"
                rows="4"
                required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >{{ old('aktivitas') }}</textarea>

            @error('aktivitas')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded transition"
            >
                Simpan
            </button>
            <a
                href="{{ route('logs.index') }}"
                class="ml-4 text-gray-600 hover:text-gray-800 transition"
            >
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
