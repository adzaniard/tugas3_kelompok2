<!-- app/views/categories/index.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<h2>Daftar Kategori</h2>
<a href="/categories/create">Tambah Kategori</a>
<ul>
    <?php foreach ($categories as $kategori): ?>
        <div>
            <p><?= htmlspecialchars($kategori['nama_kategori']) ?> - <?= htmlspecialchars($kategori['deskripsi']) ?>
            <a href="/categories/edit/<?php echo $kategori['id_kategori']; ?>">Edit</a> |
            <a href="/categories/delete/<?php echo $kategori['id_kategori']; ?>" onclick="return confirm('Anda Yakin?')">Delete</a>
            </p>
        </div>
    <?php endforeach; ?>
</ul>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>