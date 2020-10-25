<?= $this->extend('admin/template/header') ?>

<?= $this->section('admin_header') ?>

<!-- Navbar -->
<?= $this->include('admin/template/navbar') ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?= $this->include('admin/template/sidebar') ?>
<!-- /.Main Sidebar Container -->
<?php

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $jumlah = 3;
  $no = ($jumlah * $page) - $jumlah + 1;
} else {
  $no = 1;
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Order</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($order as $key => $value) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['pelanggan'] ?></td>
                  <td><?= $value['tglorder'] ?></td>
                  <td><?= $value['total'] ?></td>
                  <td><?= $value['bayar'] ?></td>
                  <td><?= $value['kembali'] ?></td>
                  <td><?php
                      if ($value['status'] == 1) {
                        echo '<div class="btn btn-info btn-sm">Lunas</div>';
                      } else {
                        echo "<a href='" . base_url("admin/order/find") . "/" . $value['idorder'] . "'><div class='btn btn-danger btn-sm'>Bayar</div></a>";;
                      }
                      ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="row justify-content-center">
          <?= $pager->makeLinks(1, $perPage, $total, 'bootstrap') ?>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>