# Sistem Pakar Diagnosis Penyakit Budidaya Jagung Hibrida

Aplikasi berbasis Laravel 11 untuk mendiagnosis penyakit pada tanaman jagung hibrida
menggunakan metode **Forward Chaining**.

## Fitur

**Petani**
- Registrasi & login
- Mengisi data lahan (nama lahan, lokasi, luas, jenis bibit, tanggal tanam)
- Memilih gejala penyakit yang ditemukan pada tanaman
- Melihat hasil diagnosa (penyakit + persentase kecocokan)
- Melihat rekomendasi penanganan
- Melihat riwayat diagnosa pribadi

**Admin**
- Login khusus admin
- Mengelola data gejala (CRUD)
- Mengelola data penyakit & rekomendasi (CRUD)
- Mengelola basis aturan / rule base (menghubungkan gejala ↔ penyakit)
- Memantau seluruh riwayat diagnosa petani (dengan filter)

## Metode Forward Chaining

Logika inti ada di `app/Services/ForwardChainingService.php`. Sistem mencocokkan
gejala yang dipilih petani (fakta) dengan rule setiap penyakit, lalu menghitung
persentase kecocokan = (jumlah gejala cocok / total gejala rule penyakit) x 100%.
Penyakit dengan persentase tertinggi menjadi hasil diagnosa.

## Cara Instalasi di Laptop

### 1. Prasyarat
Pastikan sudah terpasang:
- PHP >= 8.2 (`php -v`)
- Composer (`composer -V`)
- Node.js & NPM (opsional, hanya untuk asset build -- aplikasi ini sudah memakai Bootstrap via CDN jadi npm bersifat opsional)

### 2. Ekstrak & Install Dependency

```bash
cd sistem-pakar-jagung
composer install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Secara default aplikasi ini dikonfigurasi memakai **MySQL**. Buat dulu database
kosong bernama `sistem_pakar_jagung` (misalnya lewat phpMyAdmin atau CLI MySQL):

```sql
CREATE DATABASE sistem_pakar_jagung;
```

Lalu sesuaikan kredensial MySQL Anda di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_pakar_jagung
DB_USERNAME=root
DB_PASSWORD=
```

Ganti `DB_USERNAME` dan `DB_PASSWORD` sesuai pengaturan MySQL/XAMPP/Laragon di
laptop Anda (misalnya di XAMPP biasanya username `root` dan password kosong).

Jika Anda lebih suka SQLite (tanpa perlu instal MySQL sama sekali), ubah menjadi:

```env
DB_CONNECTION=sqlite
```

lalu buat file kosong `database/database.sqlite` (baris `DB_HOST`, `DB_PORT`, dst
tidak diperlukan untuk SQLite).

### 4. Migrasi & Seeder

```bash
php artisan migrate --seed
```

Perintah ini akan membuat seluruh tabel dan mengisi data awal:
- 2 akun (admin & petani contoh)
- 22 data gejala
- 6 data penyakit jagung (Bulai, Hawar Daun, Karat Daun, Busuk Batang, Busuk Tongkol, Bercak Daun Abu-abu)
- Basis aturan (rule) yang menghubungkan gejala ke penyakit

### 5. Jalankan Aplikasi

```bash
php artisan serve
```

Buka `http://localhost:8000` di browser.

### 6. Akun Login Default (dari seeder)

| Role   | Email               | Password  |
|--------|----------------------|-----------|
| Admin  | admin@jagung.test    | password  |
| Petani | petani@jagung.test   | password  |

**Segera ganti password default ini setelah login pertama kali di lingkungan produksi.**

## Struktur Basis Pengetahuan (Rule Base)

| Kode | Penyakit               | Jumlah Gejala Rule |
|------|------------------------|---------------------|
| P01  | Bulai (Downy Mildew)   | 5 |
| P02  | Hawar Daun             | 3 |
| P03  | Karat Daun             | 3 |
| P04  | Busuk Batang           | 4 |
| P05  | Busuk Tongkol          | 4 |
| P06  | Bercak Daun Abu-abu    | 3 |

Basis aturan ini bisa diubah kapan saja lewat menu **Admin > Kelola Basis Aturan**
tanpa perlu mengubah kode program.

## Struktur Folder Penting

```
app/
├── Http/Controllers/
│   ├── Admin/          -> Controller untuk admin (Gejala, Penyakit, Rule, Riwayat)
│   ├── Petani/         -> Controller untuk petani (Lahan, Diagnosa)
│   └── Auth/           -> Login & registrasi
├── Models/             -> Gejala, Penyakit, DataLahan, RiwayatDiagnosa, User
└── Services/
    └── ForwardChainingService.php   -> Inti logika forward chaining

database/
├── migrations/         -> Struktur tabel
└── seeders/            -> Data awal (gejala, penyakit, rule, user)

resources/views/
├── admin/              -> Semua halaman admin
├── petani/             -> Semua halaman petani
├── auth/               -> Login & registrasi
└── layouts/app.blade.php -> Layout utama (Bootstrap 5)
```

## Catatan Pengembangan Lanjutan

- Tambahkan gambar untuk gejala/penyakit dengan menambah kolom `gambar` (migration & storage sudah bisa diperluas)
- Tambahkan fitur cetak hasil diagnosa ke PDF (bisa pakai package `barryvdh/laravel-dompdf`)
- Tambahkan grafik statistik penyakit terbanyak di dashboard admin (bisa pakai Chart.js via CDN)
- Untuk lingkungan produksi, ganti `SESSION_DRIVER` sesuai kebutuhan dan set `APP_DEBUG=false`
