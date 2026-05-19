````md
<p align="center">
  <h1 align="center">📡 AssetTrack</h1>
  <p align="center">
    Smart Asset Tracking System berbasis LoRa & GPS
  </p>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/Status-Development-orange?style=for-the-badge">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge">
</p>

---

# 📌 Tentang AssetTrack

**AssetTrack** adalah sistem monitoring aset berbasis web yang digunakan untuk melacak dan memantau perangkat secara real-time menggunakan teknologi **LoRa** dan **GPS**.

Sistem ini menyediakan dashboard interaktif untuk monitoring lokasi aset, status perangkat, koneksi LoRa, serta informasi penting lainnya secara responsif pada desktop maupun mobile.

---

# ✨ Fitur Utama

## 📊 Dashboard Interaktif
- Tampilan modern dan responsive
- Informasi perangkat secara real-time
- UI modern dengan glassmorphism effect

## 📍 Tracking Lokasi GPS
- Monitoring lokasi aset secara langsung
- Integrasi Google Maps
- Menampilkan koordinat GPS

## 📡 Monitoring LoRa
- Status koneksi LoRa device
- Monitoring komunikasi perangkat
- Informasi update terakhir perangkat

## 📦 Manajemen Asset
- Data aset terpusat
- Informasi perangkat lengkap
- Monitoring status asset

## 🔋 Status Device
- Status online/offline
- Monitoring baterai perangkat
- Last update tracking

---

# 🛠️ Teknologi yang Digunakan

- ⚡ Laravel
- 🗄️ MySQL
- 🎨 Tailwind CSS / Custom CSS
- 🌐 Google Maps API
- 🧠 JavaScript
- 📡 LoRa
- 📍 GPS

---

# 🚀 Instalasi

## 1️⃣ Clone Repository

```bash
git clone https://github.com/alif1009/asset_tracking.git
cd asset_tracking
````

---

## 2️⃣ Install Dependency

```bash
composer install
npm install
```

---

## 3️⃣ Konfigurasi Environment

Copy file `.env`

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

---

## 4️⃣ Konfigurasi Database

Edit file `.env`

```env
DB_DATABASE=asset_tracking
DB_USERNAME=root
DB_PASSWORD=
```

---

## 5️⃣ Migrasi Database

```bash
php artisan migrate
```

Atau jika ingin reset database beserta seed

```bash
php artisan migrate:fresh --seed
```

---

## 6️⃣ Storage Link

```bash
php artisan storage:link
```

---

## 7️⃣ Jalankan Server

```bash
php artisan serve
```

Buka browser:

```bash
http://127.0.0.1:8000
```

---

# 📱 Tampilan Sistem

✅ Responsive Design
✅ Mobile Friendly
✅ Dashboard Monitoring
✅ Real-time Tracking
✅ Integrasi Maps

---

# 📂 Struktur Fitur

```bash
AssetTrack
├── Dashboard Monitoring
├── Tracking GPS
├── Monitoring LoRa
├── Asset Management
├── Device Status
└── Responsive UI
```

---

# 👨‍💻 Developer

Developed with ❤️ by **AssetTrack Team**

---
