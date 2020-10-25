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
                    <h1 class="m-0 text-dark">Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/menu') ?>">Menu</a></li>
                        <li class="breadcrumb-item active">Tambah Menu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Form -->
                    <div class="col">
                        <?php
                        if (!empty(session()->getFlashdata('info'))) {
                            echo '<div class="alert alert-danger" role="alert">';
                            $error = session()->getFlashdata('info');
                            foreach ($error as $key => $value) {
                                echo $key . " => " . $value;
                                echo "<br>";
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tambah menu</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('/admin/menu/insert') ?>" method="post" enctype="multipart/form-data" class="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="idkategori" id="idkategori">
                                        <?php foreach ($kategori as $key => $value) : ?>
                                            <option value="<?= $value['idkategori'] ?>"><?= $value['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="menu">Menu</label>
                                    <input type="text" name="menu" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" required class="form-control">
                                </div>
                                <label for="gambar">Gambar</label>
                                <div class="form-group">
                                    <input type="file" name="gambar" required class="form-control">
                                    <p>* ukuran gambar yang disarankan 250px x 250px</p></p>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?= $this->include('admin/template/footer') ?>
<?= $this->endSection() ?>