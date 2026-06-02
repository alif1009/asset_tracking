<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Asset Track Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Ditambahkan agar ikon di dalam elemen toast alert bisa merender dengan benar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

@if(session('success'))
    <div class="toast-success" id="successToast">
        <div class="toast-content">
            <i class="fa-solid fa-circle-check"></i>
            <div class="message">
                <span class="text text-1">Login Berhasil</span>
                <span class="text text-2">
                    Selamat datang kembali, {{ Auth::user()->name }}!
                </span>
            </div>
        </div>

        <i class="fa-solid fa-xmark close-toast" onclick="closeToast()"></i>
        <div class="progress"></div>
    </div>
@endif


    <div class="container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h1 class="logo">
                <span class="big">A</span>sset<span class="big">T</span>rack
            </h1>

            <nav>
                <a href="{{ route('dashboard') }}" class="menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('data-asset') }}" class="menu {{ request()->routeIs('data-asset') ? 'active' : '' }}">
                    📦 Data Asset
                </a>

                <a href="{{ route('riwayat') }}" class="menu {{ request()->routeIs('riwayat') ? 'active' : '' }}">
                    📍 Riwayat Lokasi
                </a>
            </nav>

            <!-- Menggunakan form POST internal Laravel agar proses logout valid dan aman -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <button class="logout" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar dari sistem?')) { document.getElementById('logout-form').submit(); }">
    🚪 Log out
</button>
        </aside>

        <!-- MAIN -->
        <main class="main">

            <!-- TOPBAR -->
            <header class="topbar">
                <h2>Dashboard</h2>

                <div class="left">
                    <div class="notif">
                        <img src="/images/notif.png" class="notif-icon">
                    </div>

                    <!-- ADMIN -->
                    <div class="admin-dropdown" style="position: relative;">

                        <!-- TRIGGER -->
                        <div class="admin-badge" id="adminToggle" style="cursor: pointer; display: flex; align-items: center; gap: 8px;">
                            <!-- Menampilkan foto profil user secara dinamis (fallback ke default jika kosong) -->
                            <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('images/admin.png') }}" 
                                 class="admin-icon" 
                                 style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                            
                            <!-- Menampilkan nama user yang sedang login -->
                            <span>{{ Auth::user()->name }}</span>
                            <span class="arrow">▼</span>
                        </div>

                        <!-- DROPDOWN -->
                        <div class="dropdown-menu" id="adminMenu" style="display: none; flex-direction: column; position: absolute; right: 0; background: white; border: 1px solid #ccc; border-radius: 4px; padding: 5px; min-width: 150px; z-index: 100;">
                            <!-- Mengarahkan ke rute edit profil -->
                            <a href="{{ route('profile.edit') }}" style="padding: 8px 12px; text-decoration: none; color: black; display: block;">👤 Edit Profil</a>
                        </div>

                    </div>
                </div>
            </header>

            <!-- STATUS -->
            <section class="status-bar">
                <div class="card">
                    <h3>Status LoRa</h3>
                    <p class="green">Connected</p> </div>

                <div class="card">
                    <h3>Last Update</h3>
                    <p class="green">Just Now</p> </div>

                <div class="card">
                    <h3>Baterai</h3>
                    <p>85%</p> </div>
            </section>

            <section class="content">

                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3854.011578453707!2d104.0484566!3d1.1187204999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e1!3m2!1sen!2sid!4v1776418926197!5m2!1sen!2sid"
                        width="1000" height="495" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="right-panel">

                    <div class="card-box">
                        <h3>Detail Asset</h3>
                        
                        <div class="detail-item">
                            <p>ID Device</p>
                            <strong>AST-001</strong>
                        </div>

                        <div class="detail-item">
                            <p>Nama Asset</p>
                            <strong>Laptop Lab 01</strong>
                        </div>

                        <div class="detail-item">
                            <p>Status</p>
                            <strong class="green">Aktif</strong>
                        </div>

                        <div class="detail-item">
                            <p>Koneksi LoRa</p>
                            <strong class="green">Stabil</strong>
                        </div>
                    </div>

                    <div class="card-box">
                        <h3>Detail GPS</h3>

                        <div class="detail-item">
                            <p>Titik Koordinat</p>
                            <strong>1.1186, 104.0484</strong>
                        </div>

                        <div class="detail-item">
                            <p>Waktu</p>
                            <strong>15:30 WIB</strong>
                        </div>

                        <div class="detail-item">
                            <p>Tanggal</p>
                            <strong>19 Mei 2026</strong>
                        </div>
                    </div>

                </div>
            </section>

            <!--FOOTER-->
            <section class="logs">
                <h3>Keterangan Asset</h3>

                <div class="log-item">
                    <span class="time">12:45 PM</span>
                    <p><span class="red"></span></p>
                </div>

                <div class="log-item">
                    <span class="time">07:00 AM</span>
                    <p><span class="green"></span></p>
                </div>
            </section>

        </main>

    </div>

    <script>
        const toggle = document.getElementById("adminToggle");
        const menu = document.getElementById("adminMenu");

        toggle.addEventListener("click", () => {
            menu.style.display = menu.style.display === "flex" ? "none" : "flex";
        });

        // klik di luar → close
        window.addEventListener("click", function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.style.display = "none";
            }
        });
    </script>

    <script>
    const toast = document.getElementById('successToast');
    
    if (toast) {
        // Otomatis tutup setelah 4 detik (4000ms)
        setTimeout(() => {
            closeToast();
        }, 4000);
    }

    function closeToast() {
        if (toast) {
            toast.style.animation = "slideOut 0.5s ease forwards";
            setTimeout(() => {
                toast.remove();
            }, 500); // Hapus elemen setelah animasi slideOut selesai
        }
    }
</script>

</body>

</html>