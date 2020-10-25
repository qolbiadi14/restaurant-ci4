<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
    <!-- Start header -->
    <?= $this->include('template/navbar') ?>
    <!-- End header -->

    <!-- Start header -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Token sudah kadaluarsa silahkan kirim ulang email</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End header -->

    <!-- Start Contact info -->
    <div class="contact-imfo-box">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="overflow-hidden">
                        <h4>Telepon</h4>
                        <p class="lead">
                            <?= $identitas['nomortoko'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-envelope"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            <?= $identitas['emailtoko'] ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-map-marker"></i>
                    <div class="overflow-hidden">
                        <h4>Location</h4>
                        <p class="lead">
                            <?= $identitas['alamattoko'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact info -->

    <?= $this->include('template/footer') ?>

    <?= $this->endSection() ?>