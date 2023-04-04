## Persiapan

-   Membutuhkan Git (Optional) => https://git-scm.com/downloads
-   Membutuhkan Composer
-   Membutuhkan XAMPP

## Download Menggunakan GIT (TERMINAL)

-   buka terminal di tempat project yang ingin di letak kan
-   ketikkan :
    -   git clone https://github.com/TerraEdition/photographer.git
-   lanjut ke cara penggunaan

## Perbarui Aplikasi Menggunakan GIT (TERMINAL)

-   buka terminal di folder project
-   ketikkan :
    -   git pull
    -   php artisan migrate
    -   php artisan serve

## Keuntungan GIT

-   tidak perlu mendownload ulang, jika ada perubahan aplikasi.
-   tidak perlu menjalankan perintah seperti proses install pertama kali.

## Cara Penggunaan

-   Buka Xampp, Jalankan PHP dan MySQL
-   Buka phpmyadmin dan buat sebuah database
-   Buka folder project, cari file bernama .env
-   edit bagian APP_NAME dan pengaturan database nya saja (Selain itu tidak perlu di ubah)
-   buka terminal di dalam folder project
-   ketikkan :
    -   composer install
    -   copy .env.example .env
    -   php artisan key:generate
    -   php artisan storage:link
    -   php artisan migrate => untuk membuat table ke database
    -   php artisan db:seed --class=DatabaseSeeder => untuk menambah data demo ke table
    -   php artisan serve => untuk menjalankan aplikasi
-   setelah itu jangan menutup terminal.
-   buka browser dan ketikkan localhost:8000

## Akun

-   Administrator =>
    username : admin  
    password : 1122

-   Regular User =>
    username : user  
    password : 1122
