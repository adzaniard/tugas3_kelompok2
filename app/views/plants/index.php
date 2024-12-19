<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        DATA TANAMAN
                    </div>
                    <div class="card-body">
                        <a href="/plants/create" class="btn btn-success mb-3">TAMBAH TANAMAN</a>
                        
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID Tanaman</th>
                                    <th scope="col">Nama Tanaman</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Penjual</th>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>