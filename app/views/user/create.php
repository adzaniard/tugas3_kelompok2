<!-- app/views/user/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
            filter: blur(2px);
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>TAMBAH PENGGUNA BARU</h4>
                    </div>
                    <div class="card-body">
                        <form action="/user/store" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" placeholder="Masukkan Email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control" rows="4" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <a href="/user/index" class="btn btn-primary">Back to List</a>
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