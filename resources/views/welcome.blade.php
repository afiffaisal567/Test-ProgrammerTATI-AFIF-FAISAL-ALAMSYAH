<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center">

    <div class="text-center space-y-6 px-4">
        <h1 class="text-4xl font-bold">Selamat Datang di Aplikasi Log Pegawai</h1>
        <p class="text-lg text-gray-600">Kelola log harian pegawai, verifikasi atasan, dan catatan aktivitas dengan mudah dan efisien.</p>

        @guest
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded shadow transition">
                Masuk
            </a>
            <a href="{{ route('register') }}" class="inline-block px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-900 rounded shadow transition">
                Daftar
            </a>
        </div>
        @endguest
    </div>

</body>
</html>
