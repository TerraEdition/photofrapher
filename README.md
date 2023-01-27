## Persiapan
- Membutuhkan Git (Optional)
- Membutuhkan Composer
- Membutuhkan XAMPP
- Membutuhkan Node JS (Optional)


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
