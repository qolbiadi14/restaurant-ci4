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
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php $level = session()->get('level');
        if ($level === 'Admin') : ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('admin/order') ?>">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $order; ?></h3>

                <p>Order Hari ini</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('admin/orderdetail') ?>">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $orderdetail; ?></h3>

                <p>Detail Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('admin/user') ?>">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $user; ?></h3>

                <p>Admin yang registrasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('admin/pelanggan') ?>">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $pelanggan; ?></h3>

                <p>Jumlah pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
        <?php endif ?>
        <?php $level = session()->get('level');
        if ($level === 'Kasir') : ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('kasir/order') ?>">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $order; ?></h3>

                <p>Order hari ini</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('kasir/orderdetail') ?>">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $orderdetail; ?></h3>

                <p>Detail Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
        <?php endif ?>
        <?php $level = session()->get('level');
        if ($level === 'Koki') : ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="<?= base_url('kasir/orderdetail') ?>">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $orderdetail; ?></h3>

                <p>Detail Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
            </a>
          </div>
          <!-- ./col -->
        <?php endif ?>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>