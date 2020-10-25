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
          <h1 class="m-0 text-dark">Pembayaran Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/order') ?>">Order</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Form -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Form Pembayaran Pelanggan</h3>
        </div>
        <!-- /.card-header -->
        <div class="row mt-2">
          <div class="col">
            <p style="text-align: center;">Pelanggan : <?= $order[0]['pelanggan'] ?></p>
          </div>
          <div class="col">
            <p style="text-align: center;">Tanggal : <?= date("d-m-Y", strtotime($order[0]['tglorder'])) ?></p>
          </div>
          <div class="col">
            <p style="text-align: center;">Total : <b> <?= number_format($order[0]['total']) ?></b></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php
            if (!empty(session()->getFlashdata('info'))) {
              echo '<div class="alert alert-danger" role="alert">';
              echo session()->getFlashdata('info');
              echo '</div>';
            }

            ?>
          </div>
        </div>
        <!-- form start -->
        <form action="<?= base_url('/admin/order/update') ?>" method="post" class="form">
          <div class="card-body">
            <div class="form-group row">
              <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="bayar" required name="bayar">
                <input type="hidden" name="total" value="<?= $order[0]['total'] ?>" required class="form-control">
                <input type="hidden" name="idorder" value="<?= $order[0]['idorder'] ?>" required class="form-control">
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Rincian Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach ($detail as $value) : ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value['menu'] ?></td>
                      <td><?= $value['hargajual'] ?></td>
                      <td><?= $value['jumlah'] ?></td>
                      <td><?= $value['jumlah'] * $value['hargajual']; ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>