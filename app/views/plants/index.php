<!-- app/views/user/index.php -->
<h2>Daftar Pengguna</h2>
<a href="/plants/create">Tambah Pengguna Baru</a>
<ul>
    <?php foreach ($plants as $plants): ?>
        <div>
            <p><?= htmlspecialchars($plants['nama_tanaman']) ?> - <?= htmlspecialchars($plants['nama_kategori']) ?> - <?= htmlspecialchars($plants['deskripsi']) ?> - <?= htmlspecialchars($plants['harga']) ?> - <?= htmlspecialchars($plants['penjual']) ?>
            <a href="/plants/edit/<?php echo $plants['id_tanaman']; ?>">Edit</a> |
            <a href="/plants/delete/<?php echo $plants['id_tanaman']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
