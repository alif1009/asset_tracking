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

    <!-- SIDEBAR -->
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

        <button class="logout">🚪 Log out</button>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8 flex flex-col">

        <div class="space-y-6">

            <!-- HEADER -->
            <div class="glass p-5">
                <h2 class="text-2xl font-semibold">Riwayat Lokasi</h2>
            </div>

            <!-- FILTER -->
            <div class="flex gap-4">
                <div class="input-glass px-4 py-2 rounded-lg flex-1">
                    📅 1 April 2026 - 5 April 2026
                </div>

                <div class="input-glass px-4 py-2 rounded-lg flex-1">
                    Status Asset: Semua
                </div>

                <button class="bg-orange-500 px-6 rounded-lg">
                    Export CSV
                </button>
            </div>

            <!-- TABLE -->
            <div class="glass p-4">

                <!-- HEADER -->
                <div class="table-header">
                    <div>Nama Asset</div>
                    <div>Waktu</div>
                    <div>Keterangan</div>
                    <div>Status Asset</div>
                    <div>Lokasi Terakhir</div>
                </div>

                <!-- ROW 1 -->
                <div class="table-row">
                    <div class="col">Laptop Lab 01</div>
                    <div class="col">Gedung TA</div>
                    <div class="col warning">⚠ Keluar Zona Aman</div>
                    <div class="col">
                        <span class="status-active">Aktif</span>
                    </div>
                    <div class="col">Gedung TA lt 10</div>
                </div>

                <!-- ROW 2 -->
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

        <!-- CATATAN -->
        <div class="glass p-4 mt-auto">
            <p class="text-yellow-300 font-semibold">*Catatan</p>
            <p class="text-green-400 text-sm">Diperbarui 10 menit yang lalu</p>
        </div>

    </main>

</div>

</body>
</html>