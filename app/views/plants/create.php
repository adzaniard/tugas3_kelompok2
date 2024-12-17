<!-- app/views/plants/create.php -->
<h2>Tambah Tanaman Baru</h2>
<form action="/plants/store" method="POST">
<label for="nama_tanaman">Nama Tanaman:</label>
<input type="varchar" name="nama_tanaman" id="nama_tanaman" required>
<br>
<label for="id_kategori">Kategori Tanaman:</label>
   <select name="id_kategori" id="">
        <option value=""></option>
        <?PHP foreach ($categories as $c): ?>
            <option value="<?=$c['id_kategori'] ?>"><?=$c['nama_kategori']?></option>
            <?php endforeach; ?>
    </select>
<br>
<label for="deskripsi">Deskripsi:</label>
<input type="varchar" name="deskripsi" id="deskripsi" required>
<br>
<label for="harga">Harga:</label>
<input type="number" name="harga" id="harga" required>
<br>
<label for="penjual">Penjual:</label>
<input type="varchar" name="penjual" id="penjual" required>
<br>
</form>
