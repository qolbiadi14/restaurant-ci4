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
                    <h1 class="m-0 text-dark">Identitas Toko</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Identitas</li>
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
                    <h3 class="card-title">Identitas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>NAMA TOKO</th>
                                <th>TITLE</th>
                                <th>ALAMAT TOKO</th>
                                <th>EMAIL TOKO</th>
                                <th>NOMOR TELEPON TOKO</th>
                                <th>DESKRIPSI TOKO</th>
                                <th>ICON TOKO</th>
                                <th>LOGO TOKO</th>
                                <th>BACKGROUND HERO</th>
                                <th>UBAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($identitas as $key => $value) : ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?= $value['namatoko'] ?></td>
                                    <td style="vertical-align: middle;"><?= $value['title'] ?></td>
                                    <td style="vertical-align: middle;"><?= $value['alamattoko'] ?></td>
                                    <td style="vertical-align: middle;"><?= $value['emailtoko'] ?></td>
                                    <td style="vertical-align: middle;"><?= $value['nomortoko'] ?></td>
                                    <td style="vertical-align: middle;"><?= $value['deskripsitoko'] ?></td>
                                    <td style="width: 275px; vertical-align: middle;"><img src="<?= base_url() . '/img/icon/' . $value['icon'] ?>" class="card-img"></td>
                                    <td style="width: 275px; vertical-align: middle;"><img src="<?= base_url() . '/img/logo/' . $value['logo'] ?>" class="card-img"></td>
                                    <td style="width: 275px; vertical-align: middle;"><img src="<?= base_url() . '/img/hero/' . $value['hero'] ?>" class="card-img"></td>
                                    <td style="vertical-align: middle;"><a href="<?= base_url('/admin/identitas/find/' . $value['idtoko']) ?>">
                                            <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>