<!-- app/views/categories/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Kategori</title>
</head>
<body>
    
<div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT KATEGORI
            </div>
            <div class="card-body">
    <form action="/categories/update/<?php echo $categories['id_kategori']; ?>" method="POST">

    <div class="form-group">
        <label for="nama_kategori">Nam Kategori:</label>
        <input type="text" id="nama_kategori" name="nama_kategori" value="<?php echo $categories['nama_kategori']; ?>" placeholder="Masukkan Kategori" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="deskripsi">Dreskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $categories['deskripsi']; ?>" placeholder="Masukkan Deskripsi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
    <a href="/categories/index">Back to List</a>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
</body>
</html>