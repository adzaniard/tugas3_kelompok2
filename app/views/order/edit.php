
<!-- app/views/order/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Order</title>
</head>
<body>
    <h2>Edit Order</h2>
    <form action="/order/update/<?php echo $order['id_order'];?>" method="POST">
    <label for="id_tanaman">Nama Tanaman:</label>
    <select name="id_tanaman" id="id_tanaman">
            <?php foreach ($plants as $p): ?>
                <option value="<?php echo $p['id_tanaman']; ?>"
                    <?php echo ($p['id_tanaman'] == $order['id_tanaman']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($p['nama_tanaman']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    <br>
    <label for="id_user">Pembeli:</label>
    <select name="id_user" id="id_user">
        <?php foreach ($users as $u): ?>
            <option value="<?php echo $u['id_user']; ?>"
            <?php echo ($u['id_user'] == $order['id_user']) ? 'selected' : ''; ?>>
            <?php echo htmlspecialchars($u['nama']); ?>
            </option>
            <?php endforeach; ?>
    </select>
    <br>
        <label for="status_pesanan">Status Pesanan:</label>
        <input type="text" id="status_pesanan" name="status_pesanan" value="<?php echo $order['status_pesanan']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/order/index">Back to List</a>
</body>
</html>
