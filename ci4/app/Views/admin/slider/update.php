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
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori') ?>">Slider</a></li>
                        <li class="breadcrumb-item active">Edit Gambar Slider</li>
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
                    <h3 class="card-title">Edit Slider</h3>
                </div>
                <div class="col mt-2">
                    <img style="width: 80px; height: 60px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('/img/slider/' . $slider['slider'] . '') ?>">
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('/admin/slider/update') ?>" method="post" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="Slider">Gambar Slider</label>
                                <input type="file" class="form-control" name="slider" required>
                            </div>
                        </div>
                        <input type="hidden" name="idslider" value="<?= $slider['idslider'] ?>">
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN">
                        </div>
                </form>
            </div>
            <!-- /.card -->

            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>