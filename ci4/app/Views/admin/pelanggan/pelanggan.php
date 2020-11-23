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
          <h1 class="m-0 text-dark">Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <?php

  if (isset($_GET['page_page'])) {
    $page = $_GET['page_page'];
    $jumlah = 3;
    $no = ($jumlah * $page) - $jumlah + 1;
  } else {
    $no = 1;
  }

  ?>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Customer</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aktif</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($pelanggan as $key => $value) : ?>
                <tr>
                  <?php
                  if ($value['aktif'] == 1) {
                    $status = '<div class="btn btn-info btn-sm">Aktif</div>';
                  } else {
                    $status = '<div class="btn btn-warning btn-sm">Banned</div>';
                  }
                  ?>
                  <td><?= $no++ ?></td>
                  <td><?= $value['pelanggan'] ?></td>
                  <td><?= $value['alamat'] ?></td>
                  <td><?= $value['telp'] ?></td>
                  <td><?= $value['email'] ?></td>
                  <td><a href="<?= base_url() ?>/admin/pelanggan/update/<?= $value['idpelanggan'] ?>/<?= $value['aktif'] ?>"><?= $status ?></a></td>
                  <td><a href="<?= base_url() ?>/admin/pelanggan/delete/<?= $value['idpelanggan'] ?>">
                      <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                  </td>
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
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>