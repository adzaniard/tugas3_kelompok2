<!-- app/views/order/create.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Siswa</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH ORDER BARU
        </div>
        <div class="card-body">
        <form action="/order/store" method="POST">
        <div class="form-group">
        <label for="id_tanaman">Nama Tanaman:</label>
    <select name="id_tanaman" id="">
        <option value=""></option>
        <?php foreach ($plants as $p): ?>
        <option value="<?=$p['id_tanaman'] ?>"><?=$p['nama_tanaman']?></option>
        <?php endforeach; ?>
    </select>
        <br>

        <div class="form-group">
        <label for="id_user">Pembeli:</label>
    <select name="id_user" id="">
        <option value=""></option>
        <?php foreach ($users as $u): ?>
            <option value="<?=$u['id_user'] ?>"><?=$u['nama']?></option>
            <?php endforeach; ?>
    </select>
    <br>
    <label for="status_pesanan">Status Pesanan:</label>
    <input type="text" name="status_pesanan" id="status_pesanan" required>

                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

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