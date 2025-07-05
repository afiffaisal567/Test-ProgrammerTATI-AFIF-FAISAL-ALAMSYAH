@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Uji Predikat Kinerja</h2>

    <form method="GET" action="/uji-predikat">
        <div class="mb-4">
            <label for="hasil_kerja" class="block mb-1 font-semibold">Hasil Kerja</label>
            <select name="hasil_kerja" id="hasil_kerja" class="w-full border px-3 py-2 rounded">
                @foreach(['di atas ekspektasi', 'sesuai ekspektasi', 'di bawah ekspektasi'] as $val)
                    <option value="{{ $val }}" {{ $hasil_kerja === $val ? 'selected' : '' }}>{{ ucfirst($val) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="perilaku" class="block mb-1 font-semibold">Perilaku</label>
            <select name="perilaku" id="perilaku" class="w-full border px-3 py-2 rounded">
                @foreach(['di atas ekspektasi', 'sesuai ekspektasi', 'di bawah ekspektasi'] as $val)
                    <option value="{{ $val }}" {{ $perilaku === $val ? 'selected' : '' }}>{{ ucfirst($val) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Cek Predikat</button>
    </form>

    @isset($predikat)
        <div class="mt-6 p-4 bg-gray-100 rounded">
            <strong>Predikat Kinerja:</strong> {{ $predikat }}
        </div>
    @endisset
</div>
@endsection
