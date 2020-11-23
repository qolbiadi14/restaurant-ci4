<?= $this->extend('admin/template/header') ?>

<?= $this->section('admin_header') ?>

<!-- Navbar -->
<?= $this->include('admin/template/navbar') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?= $this->include('admin/template/sidebar') ?>
<!-- /.Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Order Detail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
            <li class="breadcrumb-item active">Order Detail</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php

  if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
  } else {
    $no = 1;
  }

  ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Find Date</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
            <form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post">
              <div class="form-group">
                <label>Tanggal Awal</label>
                <input type="date" name="awal" require class="form-control">
              </div>
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="sampai" require class="form-control">
              </div>
              <button type="submit" name="cari" class="btn btn-info">Cari</button>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Detail</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($orderdetail as $key => $value) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['tglorder'] ?></td>
                    <td><?= $value['menu'] ?></td>
                    <td><?= $value['harga'] ?></td>
                    <td><?= $value['jumlah'] ?></td>
                    <td><?= $value['jumlah'] * $value['harga'] ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row justify-content-center">
          <?= $pager->links('page', 'bootstrap') ?>
        </div>
        <div>
        </div>
        <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>