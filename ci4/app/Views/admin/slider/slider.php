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
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href=" <?= base_url('/admin/slider/create') ?>"><button class="btn btn-md btn-primary mt-3 mb-3 "><i class="fas fa-plus fa-sm"></i> Tambah Gambar</button></a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>GAMBAR SLIDER</th>
                                <th>DELETE</th>
                                <th>UPDATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($slider as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <div class="col mt-2">
                                            <img style="width: 80px; height: 60px;" src="<?= base_url('/img/slider/' . $value['slider'] . '') ?>">
                                        </div>
                                    </td>
                                    <td><a href="<?= base_url('/admin/slider/delete/' . $value['idslider']) ?>">
                                            <div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>
                                    </td>
                                    <td><a href="<?= base_url('/admin/slider/find/' . $value['idslider']) ?>">
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