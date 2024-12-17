<!-- app/views/plants/create.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   


<div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH TANAMAN BARU
            </div>
            <div class="card-body">
<form action="/plants/store" method="POST">
<div class="form-group">
<label for="nama_tanaman">Nama Tanaman:</label>
<input type="varchar" name="nama_tanaman" id="nama_tanaman" placeholder="Masukkan Nama Tanaman" class="form-control" required>
</div>
<label for="id_kategori">Kategori Tanaman:</label>
   <select name="id_kategori" id="">
        <option value=""></option>
        <?PHP foreach ($categories as $c): ?>
            <option value="<?=$c['id_kategori'] ?>"><?=$c['nama_kategori']?></option>
            <?php endforeach; ?>
    </select>
<div class="form-group">
<label for="deskripsi">Deskripsi Tanaman:</label>
<input type="varchar" name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi Tanaman" class="form-control" required>
</div>

<div class="form-group">
<label for="harga">Harga:</label>
<input type="number" name="harga" id="harga" placeholder="Masukkan Harga" class="form-control" required>
</div>

<div class="form-group">
<label for="penjual">Penjual:</label>
<input type="varchar" name="penjual" id="penjual" placeholder="Masukkan Nama Penjual" class="form-control" required>
</div>
    <button type="submit" class="btn btn-success">SIMPAN</button>
     <button type="reset" class="btn btn-warning">RESET</button>
</form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

