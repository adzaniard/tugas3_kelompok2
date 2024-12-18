<!-- app/views/categories/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Kategori</title>
</head>
<body>
    
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>EDIT KATEGORI</h4>
                </div>
                <div class="card-body">
                    <form action="/categories/update/<?php echo $categories['id_kategori']; ?>" method="POST">
                        <!-- Input Nama Kategori -->
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori:</label>
                            <input type="text" id="nama_kategori" name="nama_kategori" value="<?php echo htmlspecialchars($categories['nama_kategori']); ?>" placeholder="Masukkan Kategori" class="form-control" required>
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <input type="text" id="deskripsi" name="deskripsi" value="<?php echo htmlspecialchars($categories['deskripsi']); ?>" placeholder="Masukkan Deskripsi" class="form-control" required>
                        </div>

                        <!-- Tombol Update dan Back -->
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/categories/index" class="btn btn-primary">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>