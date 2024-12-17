<!-- app/views/order/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Tanaman</title>
</head>
<body>
    <h2>Edit Tanaman</h2>
    <form action="/plants/update/ <?php echo $plants['id_plants'];?>" method="POST">
    <label for="nama_tanaman">Nama Tanaman:</label>
    <input type="varchar" name="nama_tanaman" id="nama_tanaman" required>
    <br>
    <label for="id_kategori">Kategori Tanaman:</label>
    <select name="id_kategori" id="">
        <option value=""><?=$plants['nama_kategori']?></option>
        <?php foreach ($categories as $c): ?>
            <option value="<?=$p['id_kategori'] ?>"><?=$p['nama_kategori']?></option>
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
        <button type="submit">Update</button>
    </form>
    <a href="/order/index">Back to List</a>
</body>
</html>