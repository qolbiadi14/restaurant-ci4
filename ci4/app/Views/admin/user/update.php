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
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">User</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('/admin/user/change') ?>" method="post" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" value="<?= $user['iduser'] ?>" name="iduser" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" value="<?= $user['user'] ?>" name="user" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" value="<?= $user['email'] ?>" name="email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level">
                                <?php foreach ($level as $key) : ?>
                                    <option <?php if ($user['level'] === $key) {
                                                echo "selected";
                                            } ?> value="<?= $key ?>"><?= $key ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" value="<?= $user['password'] ?>" name="password" required class="form-control">
                        </div>
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