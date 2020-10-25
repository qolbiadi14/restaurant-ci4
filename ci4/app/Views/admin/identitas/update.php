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
                    <h1 class="m-0 text-dark">Edit Identitas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/identitas') ?>">Identitas</a></li>
                        <li class="breadcrumb-item active">Edit Identitas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Identitas</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('/admin/identitas/update') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama Toko">Nama Toko</label>
                            <input type="text" name="namatoko" value="<?= $identitas['namatoko'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" name="title" value="<?= $identitas['title'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamattoko">Alamat Toko</label>
                            <input type="text" name="alamattoko" value="<?= $identitas['alamattoko'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="emailtoko">Email Toko</label>
                            <input type="email" name="emailtoko" value="<?= $identitas['emailtoko'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nomortoko">Nomor Telepon Toko</label>
                            <input type="number" name="nomortoko" value="<?= $identitas['nomortoko'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsitoko">Deskripsi Toko</label>
                            <input type="text" name="deskripsitoko" value="<?= $identitas['deskripsitoko'] ?>" class="form-control" required>
                        </div>
                        <input type="hidden" name="idtoko" value="<?= $identitas['idtoko'] ?>" required class="form-control">
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">
                        </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class='row'>
        <!-- /.card -->
            <!-- general form elements -->
            <div class='col-md-4'>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ganti Favicon</h3>
                </div>
                <!-- /.card-header -->
                <div class="col mt-2">
                    <img style="width: 80px; height: 60px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('/img/icon/' . $identitas['icon'] . '') ?>">
                </div>
                <!-- form start -->
                <form action="<?= base_url('/admin/identitas/updateGambar') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" name="icon" value="<?= $identitas['icon'] ?>" class="form-control">
                        </div>
                        <p>*ukuran yang disarankan 16 x 16 px</p>
                        <input type="hidden" name="idtoko" value="<?= $identitas['idtoko'] ?>" required class="form-control">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" name="upicon" value="SIMPAN">
                        </div>
                </form>
            </div>
            </div>
            </div>
            <!-- general form elements -->
            <div class='col-md-4'>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ganti Logo</h3>
                </div>
                <!-- /.card-header -->
                <div class="col mt-2">
                    <img style="width: 80px; height: 60px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('/img/logo/' . $identitas['logo'] . '') ?>">
                </div>
                <!-- form start -->
                <form action="<?= base_url('/admin/identitas/updateGambar') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" value="<?= $identitas['logo'] ?>" class="form-control">
                        </div>
                        <p>*ukuran yang disarankan 150 x 50 px</p>
                        <input type="hidden" name="idtoko" value="<?= $identitas['idtoko'] ?>" required class="form-control">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" name="uplogo" value="SIMPAN">
                        </div>
                </form>
            </div>
            </div>
            </div>
            <!-- general form elements -->
            <div class='col-md-4'>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ganti Background Hero</h3>
                </div>
                <!-- /.card-header -->
                <div class="col mt-2">
                    <img style="width: 80px; height: 60px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('/img/hero/' . $identitas['hero'] . '') ?>">
                </div>
                <!-- form start -->
                <form action="<?= base_url('/admin/identitas/updateGambar') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="hero">BACKGROUND HERO</label>
                            <input type="file" name="hero" value="<?= $identitas['hero'] ?>" class="form-control">
                        </div>
                        <p>*ukuran yang disarankan 1280 x 720 px</p>
                        <input type="hidden" name="idtoko" value="<?= $identitas['idtoko'] ?>" required class="form-control">
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" name="uphero" value="SIMPAN">
                        </div>
                </form>
            </div>
            </div>
            </div>
            <!-- /.card -->
            </div>
    </section>
    <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>