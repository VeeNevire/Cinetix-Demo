<p align="center">
    <img src="https://img.shields.io/badge/Laravel-12-red?logo=laravel" alt="Laravel 12">
    <img src="https://img.shields.io/badge/Tailwind_CSS-4-38bdf8?logo=tailwindcss" alt="Tailwind CSS">
    <img src="https://img.shields.io/badge/MySQL-4479A1?logo=mysql" alt="MySQL">
    <img src="https://img.shields.io/badge/Blade-FF2D20?logo=laravel" alt="Blade">
</p>

# 🎬 CineTix Demo

Aplikasi demo pemesanan tiket bioskop online berbasis **Laravel 12** dengan tema **Tailwind CSS dark cinema theme**. Dibuat untuk keperluan tugas sekolah — bukan aplikasi produksi riil.

## ✨ Fitur

| Fitur | Keterangan |
|-------|-----------|
| 🎞️ **Now Playing** | Daftar film yang sedang tayang dengan carousel interaktif |
| 🎭 **Detail Film** | Banner, sinopsis, genre, usia, jadwal per mall |
| 🪑 **Pilih Kursi** | Grid kursi interaktif (hijau = tersedia, merah = terisi) |
| 💳 **Pembayaran Simulasi** | Pilih metode bayar → auto-success (demo) |
| 🎟️ **E-Ticket** | QR Code + detail tiket dalam modal browser |
| 📋 **Riwayat Transaksi** | Daftar tiket yang sudah dibeli |
| 📱 **Responsive** | Mobile-friendly dengan poster di layar kecil |
| 🎨 **Dark Theme** | Tema gelap cinema dengan animasi AOS |

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2+, MySQL
- **Frontend:** Tailwind CSS 4, Alpine.js, Blade
- **Auth:** Laravel Breeze (Blade Stack)
- **Animasi:** AOS (Animate On Scroll)
- **Ikon:** Bootstrap Icons
- **QR Code:** endroid/qr-code
- **Notifikasi:** SweetAlert2

## 🔧 Instalasi

```bash
git clone https://github.com/VeeNevire/cinetix-demo.git
cd cinetix-demo

composer install
npm install && npm run build

cp .env.example .env
# Edit .env: sesuaikan DB_DATABASE, DB_USERNAME, DB_PASSWORD

php artisan migrate --seed
php artisan storage:link

php artisan serve
```

## 👤 Akun Demo

| Role | Email | Password |
|------|-------|----------|
| User | `demo@user.com` | `password` |
| User | `user@demo.com` | `password` |

## 👣 Panduan Penggunaan

1. **Registrasi** — OTP ditampilkan via SweetAlert (isi manual, auto-fill)
2. **Login** — Gunakan akun demo atau yang sudah dibuat
3. **Pilih Film** — Dari halaman utama atau berdasarkan Genre/Usia
4. **Pilih Jadwal** — Klik tombol **Beli** pada jadwal yang diinginkan
5. **Pilih Kursi** — Klik kursi hijau yang tersedia
6. **Bayar** — Pilih metode pembayaran → klik **Bayar Sekarang**
7. **E-Ticket** — QR Code muncul di modal, siap ditunjukkan

## 🗂️ Database

- **7 Mall** — Cinere, Depok, Bellevue, Pesona, Park, TSM, BTM
- **2 Film** — Paddington in Peru, 1 KAKAK 7 PONAKAN
- **12 Jadwal** — Tersebar di berbagai mall
- **720 Kursi** — Campuran tersedia/terisi
- **2 Transaksi** — Sample data

## 📄 Lisensi

MIT — bebas digunakan untuk pembelajaran.
