# Kopi Ulee Kareng - Landing Page & CRUD Produk

Aplikasi web Laravel untuk mempromosikan produk Kopi Ulee Kareng lengkap dengan halaman Landing Page dinamis dan pengelolaan data produk (CRUD) menggunakan CSS murni.

Proyek ini dibangun sebagai bagian dari persiapan Uji Sertifikasi Kompetensi (SERKOM) RPL.

## Fitur Utama

- **Landing Page (`/`)**: Menampilkan identitas, keunggulan, kontak usaha, dan katalog produk dinamis dari database.
- **Kelola Produk (`/products`)**: Dashboard CRUD lengkap (Tambah, Lihat, Edit, Hapus) dengan validasi data dan dukungan gambar.
- **Pure CSS**: Styling mandiri tanpa dependensi eksternal di `public/css/style.css`.
- **Automated Testing**: Pengujian fitur otomatis lengkap menggunakan Pest / PHPUnit.

## Instalasi & Menjalankan

### 1. Clone Repositori

```bash
git clone https://github.com/rXonee/kopi-ulee-kareng.git
cd kopi-ulee-kareng
composer install
```

### 2. Konfigurasi Lingkungan

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan pengaturan koneksi database pada file `.env`.

### 3. Migrasi & Seeder Database

```bash
php artisan migrate --seed
```

### 4. Jalankan Server Lokal

```bash
php artisan serve
```

Akses aplikasi melalui browser:
- Landing Page: `http://127.0.0.1:8000`
- Kelola Produk: `http://127.0.0.1:8000/products`

## Pengujian (Testing)

Jalankan test suite otomatis:

```bash
php artisan test
```

## Identitas Pengembang

- **Nama**: Rizky Aditya (`rXonee`)
- **Email**: rizkyaditya162009@gmail.com
- **Lisensi**: [MIT License](LICENSE)
