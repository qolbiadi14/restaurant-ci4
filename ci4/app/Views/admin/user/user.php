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
          <h1 class="m-0 text-dark">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
      <a href=" <?= base_url('/admin/user/create') ?>"><button class="btn btn-md btn-primary mt-3 mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah User</button></a>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Level</th>
                <th>Aktif</th>
                <th>Hapus</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($user as $key => $value) : ?>
                <tr>
                  <?php
                  if ($value['aktif'] == 1) {
                    $aktif = ('<div class="btn btn-info btn-sm">AKTIF</div>');
                  } else {
                    $aktif = ('<div class="btn btn-warning btn-sm">BANNED</div>');
                  }
                  ?>
                  <td><?= $no++ ?></td>
                  <td><?= $value['user'] ?></td>
                  <td><?= $value['email'] ?></td>
                  <td><?= $value['level'] ?></td>
                  <td><a href="<?= base_url() ?>/admin/user/update/<?= $value['iduser'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a></td>
                  <td><a href="<?= base_url() ?>/admin/user/delete/<?= $value['iduser'] ?>">
                      <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                    </a></td>
                  <td><a href="<?= base_url() ?>/admin/user/find/<?= $value['iduser'] ?>">
                      <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>
                    </a></td>
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