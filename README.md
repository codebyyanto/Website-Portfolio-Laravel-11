# Portfolio - Biodata & Showcase Proyek

Aplikasi **Portfolio** ini adalah migrasi dari website PHP Native ke framework **Laravel 11**, yang dirancang untuk menampilkan profil biodata mahasiswa, riwayat pendidikan, organisasi, keahlian, dan showcase proyek-proyek yang telah dikerjakan.


## 🚀 Fitur

Aplikasi ini memiliki dua bagian utama:
1.  **Public View (Frontend)**:
    -   **Hero Section**: Data diri singkat.
    -   **Riwayat Sekolah**: Informasi pendidikan formal.
    -   **Riwayat Organisasi**: Pengalaman organisasi.
    -   **Riwayat Kegiatan**: Seminar, Workshop, dll.
    -   **Riwayat Proyek**: Showcase proyek dengan detail, gambar, dan video.
    -   **Daftar Keahlian**: List skill dengan icon.
2.  **Admin Panel (Backend)**:
    -   Management **Data Proyek** (CRUD, upload gambar & video).
    -   Management **Data Keahlian** (CRUD, upload icon).

## 🛠️ Teknologi yang Digunakan

-   **Framework**: Laravel 11.x
-   **Bahasa**: PHP 8.2+
-   **Database**: MySQL
-   **Frontend**: Blade Templates, Tailwind CSS (via CDN), FontAwesome
-   **Icons**: FontAwesome & Uploaded Icons

## ⚙️ Persyaratan Sistem

Pastikan Anda telah menginstal:
-   [PHP](https://www.php.net/downloads) >= 8.2
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/)

## 📦 Cara Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project di komputer lokal:

1.  **Clone Repository** (atau ekstrak file zip jika diunduh manual):
    ```bash
    git clone https://github.com/username/portfolio-laravel.git
    cd portfolio_laravel
    ```

2.  **Install Dependencies**:
    ```bash
    composer install
    ```

3.  **Setup Environment**:
    -   Duplikat file `.env.example` menjadi `.env`:
        ```bash
        cp .env.example .env
        ```
    -   Atur koneksi database di file `.env`:
        ```ini
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=dbprofil_23312240  # Pastikan nama DB sesuai
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Application Key**:
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database & Seeding Data Awal**:
    Pastikan database `dbprofil_23312240` sudah dibuat di MySQL, lalu jalankan:
    ```bash
    php artisan migrate --seed --class=LegacyDataSeeder
    ```
    *Command ini akan membuat tabel dan mengisi data proyek/keahlian awal.*

6.  **Jalankan Server**:
    ```bash
    php artisan serve
    ```

7.  **Akses Aplikasi**:
    Buka browser dan kunjungi: [http://localhost:8000](http://localhost:8000)

## 🔑 Akses Admin

Untuk mengelola data (Proyek & Keahlian), akses URL berikut:
-   **Daftar Proyek**: [http://localhost:8000/admin/projects](http://localhost:8000/admin/projects)
-   **Daftar Keahlian**: [http://localhost:8000/admin/skills](http://localhost:8000/admin/skills)

*(Saat ini belum ada autentikasi login, halaman admin terbuka secara publik untuk tujuan demonstrasi/development)*

## 📂 Struktur File Penting

-   `app/Models/Project.php` & `Skill.php`: Model Database.
-   `app/Http/Controllers/HomeController.php`: Logic halaman publik.
-   `app/Http/Controllers/Admin/`: Controller untuk halaman admin.
-   `resources/views/home.blade.php`: Halaman utama portofolio.
-   `resources/views/components/`: Komponen UI (Hero, Education, dll).
-   `database/seeders/LegacyDataSeeder.php`: Data awal aplikasi.

---
&copy; 2026 Portfolio Laravel. Dibuat dengan ❤️.
