<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Pegawai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col">
        <nav class="bg-blue-700 text-white px-6 py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">Log Pegawai</h1>
                <div class="flex items-center space-x-4">
                    @auth
                        <span>Halo, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-sm">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="flex flex-1">
            <aside class="w-64 bg-white shadow-md p-4 hidden md:block">
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('dashboard') ? 'bg-blue-200 font-semibold' : '' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('logs.index') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('logs.index') ? 'bg-blue-200 font-semibold' : '' }}">
                        Log Harian Saya
                    </a>
                    <a href="{{ route('logs.create') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('logs.create') ? 'bg-blue-200 font-semibold' : '' }}">
                        Tambah Log
                    </a>
                    @if (in_array(Auth::user()->role, ['kepala_dinas', 'kepala_bidang']))
                        <a href="{{ route('logs.verify') }}"
                            class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('logs.verify') ? 'bg-blue-200 font-semibold' : '' }}">
                            Verifikasi Log
                        </a>
                    @endif

                    <a href="/uji-predikat"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->is('uji-predikat') ? 'bg-blue-200 font-semibold' : '' }}">
                        Uji Predikat
                    </a>
                    <a href="{{ route('helloworld') }}"
                        class="block px-3 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('helloworld') ? 'bg-blue-200 font-semibold' : '' }}">
                        HelloWorld
                    </a>
                </nav>
            </aside>

            <main class="flex-1 p-6">
                @if (session('status'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
