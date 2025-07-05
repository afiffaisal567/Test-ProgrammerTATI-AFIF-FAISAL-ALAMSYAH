@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-2xl font-bold mb-2">Selamat datang, {{ $user->name }}</h2>
    <p class="text-gray-700 mb-4">Anda login sebagai <strong>{{ ucfirst($user->role) }}</strong></p>

    <div class="grid gap-4">
        @if($user->role === 'kepala_dinas' || $user->role === 'kepala_bidang')
            <a href="{{ route('logs.verify') }}" class="block bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">
                Verifikasi Log Bawahan
            </a>
        @endif

        <a href="{{ route('logs.create') }}" class="block bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600">
            Tambah Log Harian
        </a>

        <a href="{{ route('logs.index') }}" class="block bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            Lihat Log Harian
        </a>

        <a href="/predikat" class="block bg-purple-600 text-white px-4 py-2 rounded shadow hover:bg-purple-700">
            Uji Predikat Kinerja
        </a>

        <a href="/helloworld" class="block bg-indigo-500 text-white px-4 py-2 rounded shadow hover:bg-indigo-600">
            Coba Fungsi HelloWorld
        </a>
    </div>
</div>
@endsection
