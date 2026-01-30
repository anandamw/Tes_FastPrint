# 🛒 Product Management System - FastPrint Junior Programmer Test

Sistem manajemen inventori modern yang dibangun dengan **Laravel 12** dan **Tailwind CSS**, dirancang untuk memenuhi persyaratan teknis posisi Junior Programmer di FastPrint. Proyek ini menggabungkan performa backend yang solid dengan pengalaman pengguna (UX) yang premium.

---

## ✨ Fitur Unggulan

- 🌓 **Mode Gelap Adaptif**: Dukungan penuh mode terang & gelap dengan toggle tema yang persisten (tersimpan otomatis).
- 📊 **Statistik Real-time**: Card statistik di Dashboard untuk memantau jumlah produk "Bisa Dijual" dan "Tidak Bisa Dijual".
- 🔄 **Sinkronisasi API Cerdas**: Perintah Artisan otomatis yang menangani autentikasi MD5, penangkapan session cookie, dan sinkronisasi data dari API rekrutmen.
- 🇮🇩 **Lokalisasi Penuh**: Pesan error validasi form yang sudah diterjemahkan ke Bahasa Indonesia untuk kemudahan penggunaan.
- 🎨 **Desain Premium**: Antarmuka berbasis Glassmorphism dengan font Inter dan animasi transisi yang halus.
- 📱 **Responsif & Modern**: Layout yang dioptimalkan untuk berbagai ukuran layar menggunakan Tailwind CSS.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (Standard MVC)
- **Frontend**: Tailwind CSS 3.x, Alpine.js (subtle interactions)
- **Database**: MySQL / MariaDB
- **Icons**: Lucide Icons / Heroicons

---

## 🚀 Cara Instalasi

1. **Clone & Masuk ke Proyek**

    ```bash
    git clone <repository-url>
    cd tes_fastprint
    ```

2. **Instal Dependensi PHP**

    ```bash
    composer install
    ```

3. **Konfigurasi Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    _Pastikan sesuaikan detail database di file `.env`._

4. **Persiapan Database**

    ```bash
    php artisan migrate
    ```

5. **Sinkronisasi Data Awal**
   Tarik data kategori, status, dan produk langsung dari server FastPrint:

    ```bash
    php artisan app:sync-products
    ```

6. **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Akses di: `http://localhost:8000`

---

## 💡 Detail Teknis Penting

### Autentikasi API

Aplikasi menggunakan `ApiService` yang secara dinamis menghitung hash MD5 menggunakan format `tes_programmerYYYY-MM-DD` dan menangani cookie `ci_session` secara otomatis untuk request POST data.

### Arsitektur UI

Navigasi dan layout utama berada di `layouts/app.blade.php`. Dark mode diimplementasikan menggunakan strategi `selector` Tailwind, memungkinkan kontrol penuh melalui JavaScript sederhana.

### Lokalisasi

Pesan error validasi dikustomisasi langsung melalui `ProductController` untuk memberikan feedback yang manusiawi dalam Bahasa Indonesia.

---

## 👤 Developer

**Ananda Mw** - [My Portfolio](https://anandamw.site)

---

_© 2026 - FastPrint Recruitment Test Implementation_
