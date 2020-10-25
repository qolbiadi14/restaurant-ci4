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
                    <h1 class="m-0 text-dark">Edit Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/menu') ?>">Menu</a></li>
                        <li class="breadcrumb-item active">Edit Menu</li>
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
                    <h3 class="card-title">Tabel Edit Menu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('/admin/menu/update') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="idkategori">
                                <?php foreach ($kategori as $key => $value) : ?>
                                    <option <?php if ($value['idkategori'] == $menu['idkategori']) echo "selected" ?> value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <input type="text" name="menu" value="<?= $menu['menu'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" value="<?= $menu['harga'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <input type="hidden" name="gambar" value="<?= $menu['gambar'] ?>" required class="form-control">
                        <input type="hidden" name="idmenu" value="<?= $menu['idmenu'] ?>" required class="form-control">
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