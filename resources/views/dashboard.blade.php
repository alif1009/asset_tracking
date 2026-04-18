<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Asset Track Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h1 class="logo">AssetTrack</h1>

            <nav>
                <a href="#" class="menu active">🏠 Dashboard</a>
                <a href="#" class="menu">📦 Data Asset</a>
                <a href="#" class="menu">📍 Riwayat Lokasi</a>
            </nav>

            <button class="logout">🚪 Log out</button>
        </aside>

        <!-- MAIN -->
        <main class="main">

            <!-- TOPBAR -->
            <header class="topbar">
                <h2>Asset Track Dashboard</h2>

                <div class="left">
                    <div class="notif">
                        <img src="/images/notif.png" class="notif-icon">
                    </div>

                    <!-- ADMIN FIX -->
                    <div class="admin-dropdown">

                        <!-- TRIGGER -->
                        <div class="admin-badge" id="adminToggle">
                            <img src="/images/admin.png" class="admin-icon">
                            <span>Admin</span>
                            <span class="arrow">›</span>
                        </div>

                        <!-- DROPDOWN MENU -->
                        <div class="dropdown-menu" id="adminMenu">
                            <a href="#">👤 Profile</a>
                            <a href="#">⚙ Settings</a>
                        </div>

                    </div>
                </div>
            </header>

            <!-- STATUS -->
            <section class="status-bar">
                <div class="card">
                    <h3>Status LoRa</h3>
                    <p class="green"></p>
                </div>

                <div class="card">
                    <h3>Last Update</h3>
                    <p class="green"></p>
                </div>

                <div class="card">
                    <h3>Baterai</h3>
                    <p></p>
                </div>
            </section>

            <!-- CONTENT -->
            <section class="content">

                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3854.011578453707!2d104.0484566!3d1.1187204999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e1!3m2!1sen!2sid!4v1776418926197!5m2!1sen!2sid"
                        width="1000" height="495" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <!-- RIGHT PANEL -->
                <div class="right-panel">

                    <div class="card-box">
                        <h3>Detail Asset</h3>
                        <p>ID Device</p>
                        <strong></strong>

                        <p>Nama Asset</p>
                        <strong></strong>

                        <p>Status</p>
                        <strong class="green"> </strong>

                        <p>Koneksi LoRa</p>
                        <strong class="green"></strong>
                    </div>

                    <div class="card-box">
                        <h3>Detail GPS</h3>

                        <p>Titik Koordinat</p>
                        <strong></strong>

                        <p>Waktu</p>
                        <strong></strong>

                        <p>Tanggal</p>
                        <strong></strong>
                    </div>

                </div>
            </section>

            <!-- FOOTER INFO -->
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

</body>

</html>