<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  

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
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>EDIT ORDER</h4>
                    </div>
                    <div class="card-body">
                        <form action="/order/update/<?php echo htmlspecialchars($order['id_order']); ?>" method="POST">
                            <div class="form-group">
                                <label for="id_tanaman">Nama Tanaman:</label>
                                <select name="id_tanaman" id="id_tanaman" class="form-control" required>
                                    <?php foreach ($plants as $p): ?>
                                        <option value="<?php echo htmlspecialchars($p['id_tanaman']); ?>" 
                                            <?php echo ($p['id_tanaman'] == $order['id_tanaman']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($p['nama_tanaman']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_user">Pembeli:</label>
                                <select name="id_user" id="id_user" class="form-control" required>
                                    <?php foreach ($users as $u): ?>
                                        <option value="<?php echo htmlspecialchars($u['id_user']); ?>" 
                                            <?php echo ($u['id_user'] == $order['id_user']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($u['nama']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status_pesanan">Status Pesanan:</label>
                                <input type="text" id="status_pesanan" name="status_pesanan" 
                                    value="<?php echo htmlspecialchars($order['status_pesanan']); ?>" 
                                    placeholder="Masukkan Status Pesanan" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/order/index" class="btn btn-primary">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
