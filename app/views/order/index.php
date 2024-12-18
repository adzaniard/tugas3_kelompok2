<!-- app/views/order/index.php -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Daftar Order</title>

<div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            DAFTAR ORDER
            </div>
            <div class="card-body">
            <a href="/order/create" class="btn btn-md btn-success" style="margin-bottom: 10px">Tambah Order Baru</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">ID ORDER</th>
                    <th scope="col">NAMA TANAMAN</th>
                    <th scope="col">NAMA PEMBELI</th>
                    <th scope="col">STATUS PESANAN</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
<ul>
    <?php foreach ($orders as $order): ?>
        <tr>
        <td><?= htmlspecialchars($order['id_order']) ?></td>
        <td><?= htmlspecialchars($order['nama_tanaman']) ?></td>
        <td><?= htmlspecialchars($order['nama']) ?></td>
        <td><?= htmlspecialchars($order['status_pesanan']) ?></td>
        <td class="text-center">
            <a href="/order/edit/<?php echo $order['id_order']; ?>" class="btn btn-sm btn-primary">EDIT</a> 
            <a href="/order/delete/<?php echo $order['id_order']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">DELETE</a>
            </td>
    </tr>    
    
    <?php endforeach; ?>
</ul>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
