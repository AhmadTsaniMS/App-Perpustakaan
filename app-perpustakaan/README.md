# 📚 Sistem Manajemen Perpustakaan Digital Kampus

Repositori ini memuat proyek aplikasi **Sistem Manajemen Perpustakaan Digital Kampus** (Laravel Framework) serta koleksi pengujian API Postman untuk pemenuhan **Workshop Pemrograman Framework - Politeknik Elektronika Negeri Surabaya (PENS)**.

---

## 📂 Struktur Repositori

- 📁 **[`app-perpustakaan/`](app-perpustakaan/)**: Aplikasi utama Laravel (Backend REST API, Web Blade, Autentikasi RBAC, Dashboard & Laporan).
- 📁 **[`postman/`](postman/)**: Koleksi pengujian RESTful API (`Perpustakaan_API.postman_collection.json`).
- 📄 **[`DEMO.md`](DEMO.md)**: Skenario & panduan tertulis 10 langkah demo UAS sesuai Pertemuan 11 (_Master Outline_ Bagian I).

---

## ⚡ Panduan Ringkas Instalasi & Menjalankan Aplikasi

### 1. Masuk ke direktori aplikasi

```bash
cd app-perpustakaan
```

### 2. Install dependensi

```bash
composer install
```

### 3. Setup environment & database

```bash
copy .env.example .env
php artisan key:generate
```

Pastikan pengaturan database MySQL (`db_perpustakaan`) dan `INTERNAL_API_URL=http://127.0.0.1:8011` telah terisi di `.env`.

### 4. Migrasi & Seeding Database

```bash
php artisan migrate:fresh --seed
```

### 5. Jalankan DUA Server (Wajib untuk Dashboard & Laporan)

- **Terminal 1 (Web Interface):**

    ```bash
    cd app-perpustakaan
    php artisan serve --port=8000
    ```

    Akses Web: [http://127.0.0.1:8000](http://127.0.0.1:8000)

- **Terminal 2 (Internal API Server):**
    ```bash
    cd app-perpustakaan
    php artisan serve --port=8011
    ```
    Akses API: [http://127.0.0.1:8011/api](http://127.0.0.1:8011/api)

> _Alasan teknis_: PHP development server bawaan berjalan secara synchronous/single-threaded. Menjalankan dua server mencegah deadlock saat Controller Dashboard di port 8000 memanggil endpoint API `/api/stats` secara internal.

---

## 📑 Dokumentasi Lengkap & Skenario Demo

- Baca dokumentasi teknis lengkap di: **[app-perpustakaan/README.md](app-perpustakaan/README.md)**
- Baca urutan 10 langkah demo UAS di: **[DEMO.md](DEMO.md)**
