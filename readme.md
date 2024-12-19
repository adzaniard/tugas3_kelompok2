# Praktikum Pemgrograman Web 2 - Politeknik Negeri Cilacap
Pada Pemprograman Web kali ini masing - masing dari kelompok kami mendapatkan projek, dan kami mendapatkan judul Aplikasi Jual-Beli Tanaman Hias dengan anggota kelompok adzania, arfilal faiznadi, dewi mona, dan hana kurnia

## penjelasan Aplikasi Jual-Beli Tanaman Hias
dalam projek ini layaknya dalam sebuah aplikasi biasa yang dimana ketika pengguna akan menggunakan aplikasi ini, pengguna akan diarahkan kepada bagian halaman utama atau dashboard aplikasi nya yang berisikan beberapa tampilan seperti user, plants, categories, dan orders

## ## Fitur dan atribut
di dalam setiap tabel users, plants, categories, dan orders memiliki beberapa fitur dan kegunaan yang sama, seperti fitur tambah data, membaca atau menyimpan data, update atau edit data, kemudian hapus data, selain itu terdapat juga atribut yang berbeda-beda di setiap tabel nya seperti, di tabel users memiliki atribut  id user, nama, email, password, dan alamat, untuk tabel plants terdapat id tanaman, nama tanaman, id kategori, deskripsi, harga, penjual, di tabel categories terdapat atribut id kategori, nama kategori, deskripsi, dan terakhir di tabel orders memiliki atribut id orders, id tanaman, id user, status tanaman

## users
ketika pengguna sudah masuk ke bagian users, akan melihat tabel tombol tambah pengguna yang dimana, ketika sudah selese mengisikan data diri dan tersimpan kemudian kembali pengguna akan melihat data nya yang baru saja di inputkan dan apabila terjadi kekeliruan dalam pengisian data, dapat menekan tombol edit untuk mengubah data yang keliru tadi, dan apabila pengguna ingin membatalkan data dirinya dapat menekan tombol hapus

## plants
ketika pengguna sudah selese mengisi data diri di tabel users, pengguna kemudian mengisi data di tabel plants yang dimana akan melihat tabel tombol tambah tanaman yang dimana ketika sudah selesai mengisikan data tanaman dan tersimpan kemudian kembali, pengguna akan melihat data nya yang baru saja di inputkan dan apabila terjadi kekeliruan dalam pengisian data, dapat menekan tombol edit untuk mengubah data yang keliru tadi, dan apabila pengguna ingin membatalkan data tanamannya dapat menekan tombol hapus

## categories
di tabel ini admin meng setting nama kategori apa saja yang masuk ke dalam tanaman hias lengkap dengan deskripsi nya juga, yang nanti nya ketika pengguna memilih tanaman dengan kategori tertentu akan secara otomatis juga keluar deskripsinya

## orders
di tabel ini admin memilih data tanaman yang sudah diinputkan oleh pengguna seperti nama tanaman, dan juga nama pembeli nya, kemudian admin memasukan data status tanamn sebagai contoh dikemas atau dalam perjalanan

<imG SRC="public/assets/img/4.png">

## Tujuan
Tujuan dari praktikum ini adalah untuk memberikan pemahaman yang lebih baik tentang arsitektur MVC dalam pengembangan aplikasi web dan untuk meningkatkan kemampuan mahasiswa dalam menerapkan konsep OOP serta melakukan operasi CRUD (Create, Read, Update, Delete) pada data.

## Tech Stack
- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript
- **Version Control:** Git (GitLab)
- **Web Server:** Apache (dengan .htaccess untuk pengaturan URL)

## Struktur Proyek
```plaintext
mvc-sample/
├── app/
│   ├── controllers/
│   │   └── UserController.php         # Controller untuk mengelola logika pengguna
│   ├── models/
│   │   └── User.php                   # Model untuk mengelola data pengguna
│   └── views/
│       └── user/
│           ├── index.php              # View untuk menampilkan daftar dan manajemen pengguna
│           ├── edit.php               # Edit untuk menampilkan halaman edit pengguna            
│           └── create.php             # View untuk menampilkan form pembuatan pengguna baru
├── config/
│   └── database.php                   # Konfigurasi database
├── public/
│   ├── .htaccess                      # Pengaturan URL rewrite
│   └── index.php                      # Entry point aplikasi
├── .htaccess                          # Pengaturan URL rewrite
└── routes.php                         # Mendefinisikan rute untuk aplikasi
```

## Cara Menjalankan Proyek
1. **Clone Repository:**
   ```bash
   git clone https://gitlab.com/praktisi-mengajar/politeknik-negeri-cilacap/pemrograman-web/mvc-sample.git
   cd mvc-sample
   ```
2. **Jika menggunakan virtual host pada apache xampp:**
   Untuk menjalankan proyek ini pada Apache XAMPP, Anda perlu membuat virtual host:

   - Edit File Konfigurasi Apache: Buka file httpd-vhosts.conf di lokasi berikut:
        ```php 
        C:\xampp\apache\conf\extra\httpd-vhosts.conf 
        ```
   - Tambahkan Konfigurasi Virtual Host: Tambahkan konfigurasi berikut di bagian bawah file:
        ```php 
        <VirtualHost *:80>
            DocumentRoot "C:/xampp/htdocs/mvc-sample/public"
            ServerName mvc-sample.local
            <Directory "C:/xampp/htdocs/mvc-sample/public">
                AllowOverride All
                Require all granted
            </Directory>
        </VirtualHost>
        ```
    - Edit File Hosts: Tambahkan entri baru pada file hosts di sistem windows :
        ```plaintext
        C:\Windows\System32\drivers\etc\hosts
        ```

    - Tambahkan baris berikut di bagian bawah:
        ```php 
        127.0.0.1 mvc-sample.local
        ```

    - Restart Apache: Setelah konfigurasi selesai, restart Apache melalui XAMPP Control Panel.

    - Akses Proyek: Buka browser dan akses aplikasi di http://mvc-sample.local.

3. **Jika menggunakan perintah php -S localhost:8080:**
    Saat menjalankan aplikasi PHP dengan perintah ```php -S localhost:8080```
    server built-in PHP hanya memahami struktur dasar dan tidak mendukung pengaturan URL rewriting seperti pada file ```.htaccess``` di Apache. Oleh karena itu, aplikasi tidak dapat menangani rute dinamis dengan benar dan akan menampilkan ```"Not Found"``` saat mengakses URL selain ```index.php``` langsung.

    Langkah yang harus diikuti:
    - Navigasi ke direktori ```mvc-sample``` dan jalankan server dari dalam folder ```public```, agar ```index.php``` langsung menjadi entry point untuk aplikasi:
        ```php
        cd mvc-sample/public
        php -S localhost:8080
        ```
    - Akses Proyek: Buka browser dan akses aplikasi di ```localhost:8080```.

## Kontribusi
Jika ingin berkontribusi pada proyek ini, silakan buat branch baru dan kirim pull request.

## Lisensi
Proyek ini dilisensikan under MIT License.