<!-- app/views/order/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tanaman</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   


   <div class="container" style="margin-top: 30px">
         <div class="row">
           <div class="col-md-8 offset-md-2">
             <div class="card">
               <div class="card-header">
                    EDIT TANAMAN
               </div>
               <div class="card-body">

    <form action="/plants/update/<?php echo $plants['id_tanaman'];?>" method="POST">
    <div class="form-group">
    <label for="nama_tanaman">Nama Tanaman:</label>
    <input type="varchar" name="nama_tanaman" id="nama_tanaman" value="<?php echo $plants['nama_tanaman']; ?>" placeholder="Masukkan Nama Tanaman" class="form-control" required>
    </div>

    <label for="id_kategori">Kategori Tanaman:</label>
    <select name="id_kategori" id="">
    <?php foreach ($categories as $c): ?>
        <option value="<?php echo $c['id_kategori'];?>"
            <?php echo ($c['id_kategori'] == $plants['id_kategori']) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($c['nama_kategori']); ?>
        </option>
         <?php endforeach; ?>
    </select>

    <div class="form-group">
    <label for="deskripsi">Deskripsi:</label>
    <input type="varchar" name="deskripsi" id="deskripsi" value="<?php echo $plants['deskripsi']; ?>" placeholder="Masukkan Deskripsi" class="form-control" required>
    </div>

    <div class="form-group">
    <label for="harga">Harga:</label>
    <input type="number" name="harga" id="harga" value="<?php echo $plants['harga']; ?>" placeholder="Masukkan Harga" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="penjual">Penjual:</label>
    <input type="varchar" name="penjual" id="penjual" value="<?php echo $plants['penjual']; ?>" placeholder="Masukkan Penjual" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">SIMPAN</button>
    <button type="reset" class="btn btn-warning">RESET</button>
    </form>
    <a href="/plants/index">Back to List</a>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>