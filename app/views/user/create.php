<?php
require_once"../mvc-sample/app/models/";
?>

<!-- app/views/user/create.php -->
<h2>Tambah Pengguna Baru</h2>
<form action="/user/store" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama" required>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <label for="alamat">Alamat:</label>
    <input type="alamat" name="alamat" id="alamat" required>
    <button type="submit">Simpan</button>
</form>
