<!-- app/views/order/create.php -->
<h2>Tambah Orderan Baru</h2>
<form action="/order/store" method="POST">
<label for="id_tanaman">Nama Tanaman:</label>
    <select name="id_tanaman" id="">
        <option value=""></option>
        <?php foreach ($plants as $p): ?>
            <option value="<?=$p['id_tanaman'] ?>"><?=$p['nama_tanaman']?></option>
            <?php endforeach; ?>
    </select>
    <br>
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
    <br>
    <button type="submit">Simpan</button>
</form>
