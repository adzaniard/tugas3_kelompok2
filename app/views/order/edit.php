
<!-- app/views/order/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   
   <div class="container" style="margin-top: 80px">
         <div class="row">
           <div class="col-md-8 offset-md-2">
             <div class="card">
               <div class="card-header">
               EDIT ORDER BARU
               </div>
   
               <div class="card-body">
    <form action="/order/update/<?php echo $order['id_order'];?>" method="POST">
    <label for="id_tanaman">Nama Tanaman:</label>
    <select name="id_tanaman" id="id_tanaman" placeholder="Pilih Tanaman" class="form-control">
            <?php foreach ($plants as $p): ?>
                <option value="<?php echo $p['id_tanaman']; ?>"
                    <?php echo ($p['id_tanaman'] == $order['id_tanaman']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($p['nama_tanaman']); ?>
                </option>
            </div>
            <?php endforeach; ?>
        </select>
    <br>

    <div class="form-group">
    <label for="id_user">Pembeli:</label>
    <select name="id_user" id="id_user" placeholder="Pilih Nama Pembeli" class="form-control">
        <?php foreach ($users as $u): ?>
            <option value="<?php echo $u['id_user']; ?>"
            <?php echo ($u['id_user'] == $order['id_user']) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($u['nama']); ?>
            </option>
            </div>
            <?php endforeach; ?>
    </select>
    <br>

    <div class="form-group">
        <label for="status_pesanan">Status Pesanan:</label>
        <input type="text" id="status_pesanan" name="status_pesanan" value="<?php echo $order['status_pesanan']; ?>" placeholder="Masukkan Status Pesanan" class="form-control" required>
        </div>

        <br>
        <button type="submit" class="btn btn-success">UPDATE</button>
        <button type="reset" class="btn btn-warning">RESET</button>
</form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="/order/index">Back to List</a>
</body>
</html>
