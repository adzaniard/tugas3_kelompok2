<!-- app/views/categories/create.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH KATEGORI BARU
            </div>
            <div class="card-body">
            <form action="/categories/store" method="POST">

            <div class="form-group">
    <label for="nama_kategori">Nama Kategori:</label>
    <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan Kategori" class="form-control" required>
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi:</label>
    <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" required>
</div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>