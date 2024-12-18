<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Utama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
      font-family: 'Times New Roman', serif;
    }

    .container-fluid {
      background: url('https://images.unsplash.com/photo-1692328601572-27f87f516a90?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8dGFuYW1hbnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center/cover;
      height: 100vh;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .container-fluid::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      z-index: 1;
    }

    .content {
      position: relative;
      z-index: 2;
    }

    .content h3 {
      font-size: 1.8rem;
      letter-spacing: 3px;
      margin-bottom: 10px;
    }

    .content h1 {
      font-size: 4rem;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .card {

      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      opacity: 0.95;
    }


    .card-body h5 {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .card-text {
      font-size: 1rem;
      min-height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .card-body img {
      height: 80px;
      width: 80px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="content">
      <h3>Welcome to</h3>
      <h1>Aplikasi Jual-Beli Tanaman Hias</h1>
      <div class="row justify-content-center">
        <div class="col-sm-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <img src="assets/img/1.png" alt="">
              <p class="card-text">Pengelolaan data pengguna aplikasi.</p>
              <a href="/user/index" class="btn btn-primary">Go to Users</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Plants</h5>
              <img src="assets/img/2.png" alt="">
              <p class="card-text">Pengelolaan data tanaman hias.</p>
              <a href="/plants/index" class="btn btn-primary">Go to Plants</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <img src="assets/img/4.jpg" alt="">
              <p class="card-text">Pengelolaan data kategori tanaman hias.</p>
              <a href="/categories/index" class="btn btn-primary">Go to Categories</a>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              <img src="assets/img/3.png" alt="">
              <p class="card-text">Pengelolaan data pesanan tanaman.</p>
              <a href="/orders/index" class="btn btn-primary">Go to Orders</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>