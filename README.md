1. Clone Repository dari GitHub

    Buka Terminal atau Command Prompt dan navigasikan ke direktori di mana Anda ingin menyimpan proyek Anda.

    bash

cd /path/to/your/directory

Clone Repository dari GitHub:

bash

    git clone https://github.com/adhimlhq/employee-app.git

    Ini akan mengunduh seluruh repository dari GitHub ke direktori lokal Anda.

2. Masuk ke Direktori Proyek

Setelah proses cloning selesai, masuk ke direktori proyek:

bash

cd employee-app

3. Install Dependensi

    Install Dependensi PHP dengan Composer: Laravel menggunakan Composer untuk mengelola dependensi PHP. Jalankan perintah berikut untuk menginstall dependensi yang diperlukan:

    bash

composer install

Install Dependensi JavaScript (Jika Ada): Jika proyek Anda menggunakan dependensi JavaScript (seperti npm atau yarn), jalankan:

bash

npm install

atau

bash

    yarn install

4. Konfigurasi Lingkungan

    Salin File .env.example ke .env: File .env berisi pengaturan lingkungan yang diperlukan oleh Laravel. Salin file .env.example menjadi .env:

    bash

cp .env.example .env

Generate Key Aplikasi: Laravel memerlukan kunci aplikasi yang unik untuk enkripsi. Jalankan perintah berikut untuk menghasilkan kunci:

bash

php artisan key:generate

Konfigurasi Database: Edit file .env untuk mengatur pengaturan database sesuai dengan konfigurasi lokal Anda. Misalnya:

dotenv

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_2024_employee
    DB_USERNAME=root
    DB_PASSWORD=

5. Migrasi Database

Jika proyek menggunakan migrasi database, jalankan perintah berikut untuk mengatur database sesuai dengan struktur yang diperlukan oleh aplikasi:

bash

php artisan migrate

6. Jalankan Server Laravel

Terakhir, Anda dapat menjalankan server pengembangan lokal Laravel dengan perintah:

bash

php artisan serve

Secara default, ini akan menjalankan server di http://localhost:8000.
