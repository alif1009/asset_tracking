<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Asset</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/data-asset.css') }}">
</head>

<body class="text-white font-sans">

<div class="flex">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div>
            <h1 class="logo">AssetTrack</h1>

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
                    class="menu {{ request()->routeIs('riwayat') ? 'active' : '' }}">
                    📍 Riwayat Lokasi
                </a>
            </nav>
        </div>

        <button class="logout">🚪 Log out</button>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8 flex flex-col">

        <!-- HEADER -->
        <div class="space-y-6">
            <div class="flex justify-between items-center glass p-5">
                <h2 class="text-2xl font-semibold">Data Asset</h2>

                <button id="openModal"
                    class="px-4 py-2 rounded-lg bg-orange-500 hover:scale-105 transition">
                    + Tambah Asset
                </button>
            </div>

            <!-- FILTER -->
            <div class="flex gap-4">
                <input type="text" placeholder="Cari Asset..."
                    class="px-4 py-2 rounded-lg w-1/3 input-glass text-black">

                <select class="px-4 py-2 rounded-lg input-glass text-black">
                    <option>Semua</option>
                    <option>Aktif</option>
                    <option>Tidak Aktif</option>
                </select>
            </div>

            <!-- TABLE -->
            <div class="glass overflow-hidden">
                <table class="w-full text-left" id="assetTable">

                    <thead class="bg-white/10">
                        <tr>
                            <th class="p-4">Nama Asset</th>
                            <th class="p-4">Lokasi</th>
                            <th class="p-4">ID</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr class="border-t border-white/20 table-row">
                            <td class="p-4 nama">Laptop Lab 01</td>
                            <td class="p-4 lokasi">Gedung TA</td>
                            <td class="p-4 id">DEV-001</td>
                            <td class="p-4 status">
                                <span class="bg-green-500 px-4 py-1 rounded-full text-sm">Aktif</span>
                            </td>

                            <td class="p-4 flex gap-2">
                                <button class="editBtn bg-yellow-400 text-black px-3 py-1 rounded-lg">Edit</button>
                                <button class="deleteBtn bg-red-500 px-3 py-1 rounded-lg">Hapus</button>
                            </td>
                        </tr>

                        <tr class="border-t border-white/20 table-row">
                            <td class="p-4 nama">Laptop Lab 03</td>
                            <td class="p-4 lokasi">Gedung Tekno</td>
                            <td class="p-4 id">DEV-002</td>
                            <td class="p-4 status">
                                <span class="bg-red-500 px-4 py-1 rounded-full text-sm">Tidak Aktif</span>
                            </td>

                            <td class="p-4 flex gap-2">
                                <button class="editBtn bg-yellow-400 text-black px-3 py-1 rounded-lg">Edit</button>
                                <button class="deleteBtn bg-red-500 px-3 py-1 rounded-lg">Hapus</button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>

        <!-- CATATAN -->
        <div class="glass p-4 mt-auto">
            <p class="text-yellow-300 font-semibold">*Catatan</p>
            <p class="text-green-400 text-sm">Diperbarui 5 menit yang lalu</p>
        </div>

    </main>
</div>

<!-- MODAL -->
<div id="modal"
    class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50">

    <div class="w-full max-w-lg glass p-6 relative">

        <button id="closeModal" class="absolute top-3 right-4 text-white text-xl">✖</button>

        <h2 class="text-xl font-semibold mb-4">Tambah / Edit Asset</h2>

        <form id="assetForm" class="space-y-4">

            <input id="namaInput" type="text" placeholder="Nama Asset"
                class="w-full px-4 py-2 rounded-lg input-glass text-white">

            <input id="lokasiInput" type="text" placeholder="Lokasi"
                class="w-full px-4 py-2 rounded-lg input-glass text-white">

            <input id="idInput" type="text" placeholder="ID Device"
                class="w-full px-4 py-2 rounded-lg input-glass text-white">

            <select id="statusInput"
                class="w-full px-4 py-2 rounded-lg input-glass text-black">
                <option>Aktif</option>
                <option>Tidak Aktif</option>
            </select>

            <button type="submit"
                class="w-full bg-orange-500 py-2 rounded-lg hover:scale-105 transition">
                Simpan
            </button>
        </form>
    </div>
</div>

<script>
const modal = document.getElementById("modal");
const openBtn = document.getElementById("openModal");
const closeBtn = document.getElementById("closeModal");
const form = document.getElementById("assetForm");

let currentRow = null;

// buka modal
openBtn.onclick = () => {
    currentRow = null;
    form.reset();
    modal.classList.replace("hidden", "flex");
};

// tutup
closeBtn.onclick = () => modal.classList.replace("flex", "hidden");

// klik luar
modal.onclick = (e) => {
    if (e.target === modal) modal.classList.replace("flex", "hidden");
};

// EDIT
document.querySelectorAll(".editBtn").forEach(btn => {
    btn.onclick = function () {
        currentRow = this.closest("tr");

        document.getElementById("namaInput").value =
            currentRow.querySelector(".nama").innerText;

        document.getElementById("lokasiInput").value =
            currentRow.querySelector(".lokasi").innerText;

        document.getElementById("idInput").value =
            currentRow.querySelector(".id").innerText;

        document.getElementById("statusInput").value =
            currentRow.querySelector(".status span").innerText;

        modal.classList.replace("hidden", "flex");
    };
});

// DELETE
document.querySelectorAll(".deleteBtn").forEach(btn => {
    btn.onclick = function () {
        if (confirm("Yakin mau hapus asset ini?")) {
            this.closest("tr").remove();
        }
    };
});

// SUBMIT (Tambah / Edit)
form.onsubmit = function (e) {
    e.preventDefault();

    const nama = document.getElementById("namaInput").value;
    const lokasi = document.getElementById("lokasiInput").value;
    const id = document.getElementById("idInput").value;
    const status = document.getElementById("statusInput").value;

    const statusColor = status === "Aktif" ? "bg-green-500" : "bg-red-500";

    if (currentRow) {
        // EDIT
        currentRow.querySelector(".nama").innerText = nama;
        currentRow.querySelector(".lokasi").innerText = lokasi;
        currentRow.querySelector(".id").innerText = id;
        currentRow.querySelector(".status").innerHTML =
            `<span class="${statusColor} px-4 py-1 rounded-full text-sm">${status}</span>`;
    } else {
        // TAMBAH
        const newRow = `
        <tr class="border-t border-white/20 table-row">
            <td class="p-4 nama">${nama}</td>
            <td class="p-4 lokasi">${lokasi}</td>
            <td class="p-4 id">${id}</td>
            <td class="p-4 status">
                <span class="${statusColor} px-4 py-1 rounded-full text-sm">${status}</span>
            </td>
            <td class="p-4 flex gap-2">
                <button class="editBtn bg-yellow-400 text-black px-3 py-1 rounded-lg">Edit</button>
                <button class="deleteBtn bg-red-500 px-3 py-1 rounded-lg">Hapus</button>
            </td>
        </tr>`;

        document.querySelector("#assetTable tbody")
            .insertAdjacentHTML("beforeend", newRow);

        location.reload(); // supaya event ke-bind ulang
    }

    modal.classList.replace("flex", "hidden");
};
</script>

</body>
</html>