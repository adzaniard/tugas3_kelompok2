# Praktikum Pemgrograman Web 2 - Aplikasi Jual Beli Tanaman Hias
Pada Pemprograman Web 2 sebagai bagian dari tugas UAS dibuatlah proyek ini oleh Kelompok 2 dari kelas TI-2C Politeknik Negeri Cilacap yang beranggotakan:
1. Adzania Rizki Dewani (230202049)
2. Arfilal Faiznadi (230302053)
3. Dewi Mona Rizki (230102058)
4. Hana Kurnia Ayu (230202062)

## Deskripsi Proyek
Proyek ini merupakan aplikasi web sederhana yang menerapkan arsitektur Model-View-Controller (MVC) dengan menggunakan konsep Pemrograman Berorientasi Objek (OOP).
Dalam proyek ini layaknya dalam sebuah aplikasi biasa yang dimana ketika pengguna akan menggunakan aplikasi ini, pengguna akan diarahkan kepada bagian halaman utama atau dashboard aplikasi yang berisikan beberapa tampilan menu  user, plants, categories, dan orders

## Tujuan
Tujuan dari praktikum ini adalah untuk memberikan pemahaman yang lebih baik tentang arsitektur MVC dalam pengembangan aplikasi web dan untuk meningkatkan kemampuan mahasiswa dalam menerapkan konsep OOP serta melakukan operasi CRUD (Create, Read, Update, Delete) pada data.

## Arsitektur  MVC Proyek Jual-Beli Tanaman Hias
MVC (Model-View-Controller) adalah salah satu pola arsitektur yang sering digunakan dalam pengembangan perangkat lunak, termasuk dalam pengembangan aplikasi berbasis web atau desktop. Tujuan utama MVC adalah memisahkan logika aplikasi menjadi tiga komponen utama untuk mempermudah pengelolaan, pemeliharaan, dan pengembangan. 
1. **Model**
Model bertanggung jawab atas pengelolaan data dan logika bisnis aplikasi. Model menangani pengambilan, penyimpanan, dan manipulasi data yang berasal dari basis data atau sumber lainnya.
```
<?php
// app/models/User.php
require_once '../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM users");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_user) {
        $query = $this->db->prepare("SELECT * FROM users WHERE id_user = :id_user");
        $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama, $email, $password, $alamat) {
        $query = $this->db->prepare("INSERT INTO users (nama, email, password, alamat) VALUES (:nama, :email, :password, :alamat)");
        $query->bindParam(':nama', $nama);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':alamat', $alamat);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id_user, $data) {
        $query = "UPDATE users SET nama = :nama, email = :email, password = :password, alamat = :alamat WHERE id_user = :id_user";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':id_user', $id_user);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id_user) {
        $query = "DELETE FROM users WHERE id_user = :id_user";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        return $stmt->execute();
    }
}
```

2. **View**
View bertugas untuk menampilkan data kepada pengguna dalam bentuk antarmuka grafis (UI). View hanya bertanggung jawab untuk presentasi data, tanpa mengetahui bagaimana data itu diperoleh atau diproses.

**Create**
```
<!-- app/views/user/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
            filter: blur(2px);
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>TAMBAH PENGGUNA BARU</h4>
                    </div>
                    <div class="card-body">
                        <form action="/user/store" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" placeholder="Masukkan Email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <a href="/user/index" class="btn btn-primary">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
```

**Edit**
```
<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        position: relative;
        height: 100vh;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
        filter: blur(2px);
        z-index: -1; 
    }

    .container {
        position: relative;
        z-index: 1; 
    }

    
</style>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>EDIT PENGGUNA</h4>
                    </div>
                    <div class="card-body">
                        <form action="/user/update/<?php echo $user['id_user']; ?>" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $user['nama']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" value="<?php echo $user['password']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="4" required><?php echo $user['alamat']; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/user/index" class="btn btn-primary">Back to List</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
```

**Data Table**
```
<!-- app/views/user/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
            filter: blur(2px);
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="#">Aplikasi Jual-Beli Tanaman Hias</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/index">Data Users</a></li>
                            <li><a class="dropdown-item" href="/categories/index">Data Categories</a></li>
                            <li><a class="dropdown-item" href="/plants/index">Data Plants</a></li>
                            <li><a class="dropdown-item" href="/order/index">Data Orders</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DAFTAR PENGGUNA</h4>
                    </div>
                    <div class="card-body">
                        <a href="/user/create" class="btn btn-success mb-3">Tambah Pengguna Baru</a>
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID USER</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PASSWORD</th>
                                    <th scope="col">ALAMAT</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id_user']) ?></td>
                                        <td><?= htmlspecialchars($user['nama']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= htmlspecialchars($user['password']) ?></td>
                                        <td><?= htmlspecialchars($user['alamat']) ?></td>
                                        <td>
                                            <a href="/user/edit/<?php echo $user['id_user']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/user/delete/<?php echo $user['id_user']; ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
```

3. **Controller**
Controller berfungsi sebagai penghubung antara Model dan View. Komponen ini menerima input dari pengguna, memprosesnya (dengan melibatkan Model), dan menentukan apa yang akan ditampilkan oleh View.
```
<?php
// app/controllers/UserController.php
require_once '../app/models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once '../app/views/user/index.php';
    }

    public function dashboard() {
        require_once '../app/views/halamanUtama.php';
    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $this->userModel->add($nama, $email, $password, $alamat);
        header('Location: /user/index');
    }
    // Show the edit form with the user data
    public function edit($id_user) {
        $user = $this->userModel->find($id_user); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/user/edit.php';
    }

    // Process the update request
    public function update($id_user, $data) {
        $updated = $this->userModel->update($id_user, $data);
        if ($updated) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id_user) {
        $deleted = $this->userModel->delete($id_user);
        if ($deleted) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
```

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

## Tabel
### Halaman Utama
    <imG SRC="public/assets/img/halamanUtama.png">
### Users
    Ketika pengguna mengakses menu Users akan diarahkan ke halaman yang menampilkan seluruh data pengguna dalam bentuk tabel. Pada halaman ini, terdapat beberapa fitur utama yang dapat digunakan untuk mengelola data pengguna, yaitu:
    - Tambah Pengguna Baru 
    Pengguna dapat menekan tombol Tambah Pengguna Baru untuk memasukkan data diri, dan setelah disimpan, tabel akan otomatis diperbarui sehingga data baru langsung terlihat.
    <imG SRC="public/assets/img/menuUser.png">
    <imG SRC="public/assets/img/tambahUser.png">
    - Edit Data Pengguna
    Jika terdapat kesalahan data, pengguna dapat menggunakan tombol Edit untuk memperbaikinya tanpa perlu menghapus data lama.
    <imG SRC="public/assets/img/editUser.png">
    <imG SRC="public/assets/img/setelahEditUser.png">
    - Hapus Data Pengguna
    Pengguna dapat menggunakan fitur Hapus untuk menghapus data tertentu, yang akan hilang dari tabel setelah konfirmasi.
    <imG SRC="public/assets/img/hapusUser.png">
    <imG SRC="public/assets/img/setelahHapusUser.png">

### Plants
    Dalam tabel ini, ketika pengguna sudah selesai mengisi data diri di tabel users, pengguna kemudian mengisi data di tabel plants yang dimana akan melihat tabel tombol tambah tanaman, saat mengisi data akan diminta mengisi nama kategori dan deskripsi yang dimana itu sudah tersambung di tabel kategori, ketika sudah selesai mengisikan data tanaman dan tersimpan kemudian kembali, pengguna akan melihat data nya yang baru saja di inputkan dan apabila terjadi kekeliruan dalam pengisian data, dapat menekan tombol edit untuk mengubah data yang keliru tadi, dan apabila pengguna ingin membatalkan data tanamannya dapat menekan tombol hapus
    - Tampilan awal tabel plants
<imG SRC="public/assets/img/menuTanaman.png">
    - Tampilan tambah tanaman
        <imG SRC="public/assets/img/tambahTanaman.png">
    - Tampilan edit
        <imG SRC="public/assets/img/editTanaman.png">
        <imG SRC="public/assets/img/setelahEditTanaman.png">
    - Tampilan Hapus
        <imG SRC="public/assets/img/setelahHapusTanaman.png">

### Categories
    Pada tabel categories terdapat atribut id kategori, kategori dan deskripsi.Tabel categories merupakan salah satu bagian dari tabel kelompok 2 jual beli tanaman hias.
    - Tampilan awal tabel categories
<imG SRC="public/assets/img/menuKategori.png">
    - Tampilan tambah categories
        <imG SRC="public/assets/img/tambahKategori.png">
    - Tampilan edit categories
        <imG SRC="public/assets/img/editKategori.png">
        <imG SRC="public/assets/img/setelahEditKategori.png">
    - Tampilan hapus categories
        <imG SRC="public/assets/img/hapusKategori.png">
        <imG SRC="public/assets/img/setelahHapusKategori.png">

### Orders
    Sistem ini dirancang untuk mengelola pesanan dengan mengintegrasikan data dari dua tabel yang sudah ada: plants dan users. Pada tabel orders admin memilih nama tanaman yang sudah diinputkan oleh tabel plants, dan juga nama pembelinya yang sudah diinputkan oleh tabel users, kemudian admin memasukan data status tanaman sebagai keterangan pesanan contohnya dikemas atau dalam perjalanan. Pada tabel orders memiliki fitur admin dapat menambah, mengedit, dan menghapus nama tanaman, admin juga dapat menambah, mengedit, menghapus pembeli, kemudian admin dapat menambah, mengedit, menghapus status pesanan.
    - Tambah order
    Menambahkan pesanan baru dengan memilih nama tanaman dan pembeli dari tabel yang ada, serta menetapkan status pesanan.
<imG SRC="public/assets/img/menuOrder.png">
    <imG SRC="public/assets/img/tambahOrder.png">
    - Edit order
    Mengedit pesanan untuk memperbarui nama tanaman, nama pembeli, atau status pesanan.
    <imG SRC="public/assets/img/editOrder.png">
    <imG SRC="public/assets/img/setelahEditOrder.png">
    - Hapus oder
    Menghapus pesanan jika diperlukan.
    <imG SRC="public/assets/img/setelahHapusOrder.png">



