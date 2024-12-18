<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanaman</title>
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
                            <li><a class="dropdown-item" href="/orders/index">Data Orders</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-red text-black">
                        <H4>DATA TANAMAN</H4>
                    </div>
                    <div class="card-body">
                        <a href="/plants/create" class="btn btn-success mb-3">tambah tanaman</a>
                        
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID TANAMAN</th>
                                    <th scope="col">NAMA TANAMAN</th>
                                    <th scope="col">NAMA KATEGORI</th>
                                    <th scope="col">DEKSRIPSI</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">PENJUAL</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($plants as $plant): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($plant['id_tanaman']) ?></td>
                                        <td><?= htmlspecialchars($plant['nama_tanaman']) ?></td>
                                        <td><?= htmlspecialchars($plant['nama_kategori']) ?></td>
                                        <td><?= htmlspecialchars($plant['deskripsi']) ?></td>
                                        <td>Rp. <?= number_format($plant['harga'], 0, ',', '.') ?></td>
                                        <td><?= htmlspecialchars($plant['penjual']) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="/plants/edit/<?= $plant['id_tanaman'] ?>" class="btn btn-sm btn-warning mr-1">Edit</a>
                                                <a href="/plants/delete/<?= $plant['id_tanaman'] ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus tanaman ini?')">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php if (empty($plants)): ?>
                            <div class="alert alert-info">
                                Tidak ada tanaman yang ditemukan.
                            </div>
                        <?php endif; ?>
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