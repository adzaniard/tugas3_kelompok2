<!-- app/views/user/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="/user/update/<?php echo $user['id_user']; ?>" method="POST">
        <label for="nama">Name:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>
        <br>
        <label for="alamat">Alamat:</label>
        <input type="alamat" id="alamat" name="alamat" value="<?php echo $user['alamat']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/user/index">Back to List</a>
</body>
</html>