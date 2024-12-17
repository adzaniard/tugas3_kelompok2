<!-- app/views/order/index.php -->
<h2>Daftar Order</h2>
<a href="/order/create">Tambah Order Baru</a>
<ul>
    <?php foreach ($orders as $order): ?>
        <div>
            <p><?= htmlspecialchars($order['nama_tanaman']) ?> - <?= htmlspecialchars($order['nama']) ?> - <?= htmlspecialchars($order['status_pesanan']) ?>
            <a href="/order/edit/<?php echo $order['id_order']; ?>">Edit</a> |
            <a href="/order/delete/<?php echo $order['id_order']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
