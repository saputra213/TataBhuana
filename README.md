# Tata Bhuana Scaffolding - Web Profile

Web profile untuk perusahaan sewa dan jual scaffolding yang dibangun dengan Laravel framework.

## Fitur

### Frontend
- **Halaman Beranda** - Menampilkan informasi perusahaan dan produk unggulan
- **Tentang Kami** - Informasi lengkap tentang perusahaan
- **Layanan** - Detail layanan yang disediakan
- **Katalog Produk** - Daftar lengkap scaffolding dengan filter dan pencarian
- **Detail Produk** - Informasi detail setiap produk scaffolding
- **Kontak** - Form kontak dan informasi perusahaan

### Admin Panel
- **Dashboard** - Statistik dan overview sistem
- **Kelola Scaffolding** - CRUD lengkap untuk produk scaffolding
- **Profil Perusahaan** - Edit informasi perusahaan
- **Authentication** - Login/logout admin dengan keamanan

## Teknologi yang Digunakan

- **Laravel 11** - PHP Framework
- **Bootstrap 5** - CSS Framework
- **Font Awesome** - Icons
- **MySQL** - Database
- **Blade Template** - Template Engine

## Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd webProfile_tataBhuana
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=scaffolding_profile
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Setup Database
```bash
# Buat database
mysql -u root -p
CREATE DATABASE scaffolding_profile;

# Jalankan migration
php artisan migrate

# Jalankan seeder untuk data awal
php artisan db:seed
```

### 6. Setup Storage Link
```bash
php artisan storage:link
```

### 7. Jalankan Server
```bash
php artisan serve
```

Website akan tersedia di `http://localhost:8000`

## Akses Admin

### Login Admin
- URL: `http://localhost:8000/admin/login`
- Email: `admin@tatabhuana.com`
- Password: `admin123`

### Fitur Admin
- Dashboard dengan statistik
- Kelola scaffolding (tambah, edit, hapus)
- Edit profil perusahaan
- Upload gambar untuk produk dan profil

## Struktur Database

### Tabel `scaffoldings`
- Informasi produk scaffolding
- Harga sewa dan jual
- Spesifikasi teknis
- Gambar produk

### Tabel `admins`
- Data admin yang dapat login
- Role dan status aktif

### Tabel `company_profiles`
- Informasi profil perusahaan
- Kontak dan media sosial
- Logo dan gambar hero

## Fitur Utama

### Frontend
1. **Responsive Design** - Tampil sempurna di semua device
2. **SEO Friendly** - Meta tags dan struktur yang optimal
3. **Fast Loading** - Optimasi gambar dan CSS
4. **User Friendly** - Interface yang mudah digunakan

### Admin Panel
1. **Secure Authentication** - Login dengan validasi
2. **CRUD Operations** - Kelola data dengan mudah
3. **Image Upload** - Upload gambar untuk produk
4. **Data Validation** - Validasi input yang ketat

## Customization

### Mengubah Tema
Edit file `public/css/app.css` untuk mengubah warna dan styling.

### Menambah Produk
Login ke admin panel dan gunakan fitur "Tambah Scaffolding".

### Mengubah Informasi Perusahaan
Login ke admin panel dan edit di menu "Profil Perusahaan".

## License

Project ini dibuat untuk Tata Bhuana Scaffolding. All rights reserved.
