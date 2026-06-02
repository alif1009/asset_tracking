<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Riwayat Lokasi</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
</head>

<body class="text-white font-sans">

<div class="flex">

    <aside class="sidebar">
        <div>
              <h1 class="logo">
    <span class="big">A</span>sset<span class="big">T</span>rack
</h1>

            <nav>
                <a href="{{ route('dashboard') }}"
                   class="menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('data-asset') }}"
                   class="menu {{ request()->routeIs('data-asset') ? 'active' : '' }}">
                    📦 Data Asset
                </a>

                <a href="{{ route('riwayat') }}"
                   class="menu active">
                    📍 Riwayat Lokasi
                </a>
            </nav>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="logout" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar dari sistem?')) { document.getElementById('logout-form').submit(); }">
    🚪 Log out
</button>
    </aside>

    <main class="flex-1 p-8 flex flex-col">

        <div class="space-y-6">

            <div class="glass p-5">
                <h2 class="text-2xl font-semibold">Riwayat Lokasi</h2>
            </div>

            <form action="{{ route('riwayat') }}" method="GET" class="flex gap-4 items-center">
                
                <div class="input-glass px-4 py-2 rounded-lg flex-1 flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20">
                    <span class="text-sm">📅</span>
                    <input type="date" name="start_date" value="{{ request('start_date', '2026-04-01') }}" class="bg-transparent border-none text-white focus:outline-none text-sm cursor-pointer [color-scheme:dark]">
                    <span class="text-xs text-gray-400">s/d</span>
                    <input type="date" name="end_date" value="{{ request('end_date', '2026-04-05') }}" class="bg-transparent border-none text-white focus:outline-none text-sm cursor-pointer [color-scheme:dark]">
                </div>

                <div class="input-glass px-4 py-2 rounded-lg flex-1 flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20">
                    <span class="text-sm">⚙️</span>
                    <label for="status_filter" class="text-sm text-gray-300 whitespace-nowrap">Status:</label>
                    <select id="status_filter" name="status" onchange="this.form.submit()" class="bg-transparent border-none text-white focus:outline-none text-sm w-full cursor-pointer">
                    <option value="semua" {{ request('status') == 'semua' ? 'selected' : '' }} class="text-black bg-white">Semua</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }} class="text-black bg-white">Aktif</option>
                    <option value="tidak-aktif" {{ request('status') == 'tidak-aktif' ? 'selected' : '' }} class="text-black bg-white">Tidak Aktif</option>
                </select>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-sm px-4 py-2 rounded-lg h-full transition duration-200">
                    Filter
                </button>

                <button type="button" class="bg-orange-500 hover:bg-orange-600 px-6 py-2 rounded-lg text-sm font-medium h-full transition duration-200 whitespace-nowrap">
                    Export CSV
                </button>
            </form>

            <div class="glass p-4">

                <div class="table-header">
                    <div>Nama Asset</div>
                    <div>Waktu</div>
                    <div>Keterangan</div>
                    <div>Status Asset</div>
                    <div>Lokasi Terakhir</div>
                </div>

                <div class="table-row">
                    <div class="col">Laptop Lab 01</div>
                    <div class="col">Gedung TA</div>
                    <div class="col warning">⚠ Keluar Zona Aman</div>
                    <div class="col">
                        <span class="status-active">Aktif</span>
                    </div>
                    <div class="col">Gedung TA lt 10</div>
                </div>

                <div class="table-row">
                    <div class="col">Laptop Lab 03</div>
                    <div class="col">Gedung Tekno</div>
                    <div class="col safe">Berada di Zona Aman</div>
                    <div class="col">
                        <span class="status-off">Tidak Aktif</span>
                    </div>
                    <div class="col">Gedung Tekno</div>
                </div>

            </div>

        </div>

        <div class="note-box p-4 mt-auto">
            <p class="text-yellow-300 font-semibold">*Catatan</p>
            <p class="text-green-400 text-sm">Diperbarui 10 menit yang lalu</p>
        </div>

    </main>

</div>

</body>
</html>