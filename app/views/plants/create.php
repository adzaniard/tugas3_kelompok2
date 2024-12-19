<!-- app/views/plants/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Tanaman</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
</head>
<body>
  

   


<div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h4>TAMBAH TANAMAN BARU</h4>
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
    <button type="submit" class="btn btn-success">Simpan</button>
     <button type="reset" class="btn btn-warning">Reset</button>
     <a href="/plants/index" class="btn btn-primary">Back to List</a>
</form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </body>
</html>

