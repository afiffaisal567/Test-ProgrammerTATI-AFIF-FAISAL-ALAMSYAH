@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Fungsi HelloWorld</h2>

    <form method="GET" action="{{ route('helloworld') }}">
        <div class="mb-4">
            <label for="n" class="block mb-1 font-semibold">Masukkan Nilai n</label>
            <input type="number" name="n" id="n" value="{{ old('n', request('n')) }}" required class="w-full border px-3 py-2 rounded" min="1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tampilkan</button>
    </form>

    @isset($output)
        <div class="mt-6 p-4 bg-gray-100 rounded">
            <strong>Output:</strong><br>
            {{ $output }}
        </div>
    @endisset
</div>
@endsection
