<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Daftar Order</title>

    <style>
    body {
        margin: 0;
        padding: 0;
        position: relative;
        height: 100vh;
    }

    /* Background Gambar Blur */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
        filter: blur(2px); /* Efek blur */
        z-index: -1; /* Agar di belakang konten */
    }

    .container {
        position: relative;
        z-index: 1; /* Konten tampil di atas background */
    }

    
</style>

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
</head>
<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DAFTAR ORDER</h4>
                    </div>
                    <div class="card-body">
                        <a href="/order/create" class="btn btn-success mb-3">Tambah Order Baru</a>
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID ORDER</th>
                                    <th scope="col">NAMA TANAMAN</th>
                                    <th scope="col">NAMA PEMBELI</th>
                                    <th scope="col">STATUS PESANAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($order['id_order']) ?></td>
                                        <td><?= htmlspecialchars($order['nama_tanaman']) ?></td>
                                        <td><?= htmlspecialchars($order['nama']) ?></td>
                                        <td><?= htmlspecialchars($order['status_pesanan']) ?></td>
                                        <td class="text-center">
                                            <a href="/order/edit/<?php echo $order['id_order']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="/order/delete/<?php echo $order['id_order']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin?')">Delete</a>
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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
