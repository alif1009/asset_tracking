<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Tracking System</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- CSS DIPISAH -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body class="font-sans text-white">

    <!-- BACKGROUND -->
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('images/bg-landing.png') }}" class="w-full h-full object-cover" />

        <div class="absolute inset-0 bg-black/10 backdrop-blur-[2px]"></div>
    </div>

    <!-- NAVBAR -->
    <nav
        class="fixed top-0 left-0 w-full z-50 
            flex justify-between items-center px-10 py-4 
            bg-black/20 backdrop-blur-lg border-b border-white/10">
        <h1 class="text-2xl font-semibold">AssetTrack</h1>

        <div class="hidden md:flex space-x-8 text-base font-medium">
            <a href="#fitur" class="hover:text-yellow-300 transition duration-200">Fitur</a>
            <a href="#teknologi" class="hover:text-yellow-300 transition duration-200">Teknologi</a>
            <a href="#tentang" class="hover:text-yellow-300 transition duration-200">Tentang</a>
        </div>

     
    </nav>

    <section class="text-center px-6 mt-20">

        <h1 class="text-5xl font-bold leading-tight">
            Asset Tracking <br>
            <span class="white-text">Berbasis LoRa Menggunakan Integrasi GPS </span>
        </h1>

        <p class="mt-6 text-gray-200 max-w-xl mx-auto">
            Aplikasi yang dibangun dengan IoT dan dikombinasikan dengan kecerdasan buatan. Algoritma geo-fencing untuk
            memberikan peringatan jika aset keluar dari zona aman.
        </p>

        <div class="mt-8 flex justify-center">
    <a href="{{ route('login') }}" class="bg-white text-orange-600 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition shadow-lg shadow-orange-600/10">
        Get Started
    </a>
</div>

    </section>

    <section id="fitur" class="mt-28 px-10">
        <div class="grid md:grid-cols-3 gap-8">

            <div onclick="bukaDetail('tracking')" class="p-6 rounded-2xl bg-white/15 backdrop-blur-lg border border-white/20 hover:scale-105 transition cursor-pointer">
        <div class="text-2xl mb-4">📍</div>
        <h3 class="font-semibold text-lg mb-2">Real-Time Tracking</h3>
        <p class="text-sm text-gray-200">
            Monitor lokasi aset secara langsung dengan visualisasi peta interaktif.
        </p>
    </div>

    <div onclick="bukaDetail('geofencing')" class="p-6 rounded-2xl bg-white/10 backdrop-blur-lg border border-white/20 hover:scale-105 transition cursor-pointer">
        <div class="text-2xl mb-4">🛑</div>
        <h3 class="font-semibold text-lg mb-2">Geofencing Alert</h3>
        <p class="text-sm text-gray-200">
            Notifikasi otomatis saat aset keluar dari area yang ditentukan.
        </p>
    </div>

    <div onclick="bukaDetail('ai')" class="p-6 rounded-2xl bg-white/10 backdrop-blur-lg border border-white/20 hover:scale-105 transition cursor-pointer">
        <div class="text-2xl mb-4">🤖</div>
        <h3 class="font-semibold text-lg mb-2">AI Detection</h3>
        <p class="text-sm text-gray-200">
            Analisis pola pergerakan untuk mendeteksi aktivitas mencurigakan.
        </p>
    </div>
</div>

<div id="popupDetail" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4 animate-fade-in">
    <div class="bg-[#2f2f2f] border border-[#ff8400] rounded-2xl p-6 max-w-md w-full text-white relative shadow-2xl">
        <button onclick="tutupDetail()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl font-bold leading-none">&times;</button>
        
        <div id="popupIcon" class="text-4xl mb-4"></div>
        <h3 id="popupTitle" class="text-xl font-semibold mb-2 text-[#ff8400]"></h3>
        <p id="popupDesc" class="text-sm text-gray-300 leading-relaxed"></p>
    </div>
</div>
    </section>

    <section id="teknologi" class="mt-28 px-10 grid md:grid-cols-2 gap-10 items-center">

        <div>
            <h2 class="text-3xl font-bold mb-4">
                Built with IoT + LoRa Technology
            </h2>

            <p class="text-gray-200">
                Sistem menggunakan komunikasi LoRa untuk efisiensi daya dan jangkauan luas,
                dikombinasikan dengan GPS untuk akurasi lokasi dan dashboard web untuk monitoring.
            </p>

            <div class="mt-6 space-y-2 text-medium text-gray-300">
                <p>✔ Hemat Daya</p>
                <p>✔ AI Deteksi Anomali</p>
                <p>✔ Monitoring Real-Time</p>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur-lg h-80 rounded-2xl border border-white/20 overflow-hidden">
            <div id="map" class="w-full h-full"></div>
        </div>

    </section>

    <section id="tentang" class="mt-10 md:mt-20 px-6 pb-24 flex justify-center">

        <div class="max-w-4xl w-full bg-black/8 backdrop-blur-xl border border-white/20 rounded-2xl p-8 shadow-lg">
            <h2 class="text-2xl font-semibold mb-4 text-white/99 text-center">
                About This System
            </h2>

            <p class="text-gray-200 leading-relaxed text-justify">
                Manajemen aset di lingkungan kampus dengan area yang luas sering kali menghadapi kendala efisiensi
                akibat sistem pengawasan yang masih bersifat manual, sehingga berisiko tinggi terhadap kehilangan dan
                penyalahgunaan aset. Penggunaan teknologi pelacakan berbasis seluler konvensional juga terbentur pada
                masalah tingginya konsumsi daya dan biaya operasional. Penelitian ini bertujuan untuk membangun sebuah
                sistem pelacakan aset berbasis Internet of Things (IoT) dengan memanfaatkan teknologi komunikasi Long
                Range (LoRa) yang hemat energi dan memiliki jangkauan luas.
            </p>

        </div>

    </section>

    <!-- JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="{{ asset('js/map.js') }}"></script>

    <script>
    // Data isi teks yang akan muncul saat kartu dipencet
    const dataKonten = {
        tracking: {
            icon: '📍',
            title: 'Real-Time Tracking',
            desc: 'Fitur ini menampilkan posisi koordinat terakhir dari perangkat IoT (GPS & LoRa Node) secara langsung di atas peta interaktif dashboard tanpa perlu melakukan refresh halaman.'
        },
        geofencing: {
            icon: '🛑',
            title: 'Geofencing Alert',
            desc: 'Sistem akan memantau batas wilayah virtual aman yang telah ditentukan. Jika perangkat melewati batas koordinat tersebut, sistem otomatis mengirimkan sinyal peringatan ke log dashboard.'
        },
        ai: {
            icon: '🤖',
            title: 'AI Detection',
            desc: 'Menggunakan log riwayat pergerakan untuk mendeteksi pola rute yang tidak biasa atau mencurigakan, memberikan lapisan keamanan tambahan pada pelacakan aset.'
        }
    };

    function bukaDetail(key) {
        const popup = document.getElementById('popupDetail');
        const konten = dataKonten[key];

        if (konten) {
            document.getElementById('popupIcon').innerText = konten.icon;
            document.getElementById('popupTitle').innerText = konten.title;
            document.getElementById('popupDesc').innerText = konten.desc;
            
            // Mengubah 'hidden' menjadi 'flex' agar popup muncul ke tengah layar
            popup.classList.remove('hidden');
            popup.classList.add('flex');
        }
    }

    function tutupDetail() {
        const popup = document.getElementById('popupDetail');
        popup.classList.remove('flex');
        popup.classList.add('hidden');
    }

    // Menutup popup secara otomatis jika area luar kotak hitam dipencet
    window.onclick = function(event) {
        const popup = document.getElementById('popupDetail');
        if (event.target == popup) {
            tutupDetail();
        }
    }
</script>

</body>

</html>
