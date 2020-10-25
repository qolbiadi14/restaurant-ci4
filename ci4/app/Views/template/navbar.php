<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <img src="<?= base_url('/img/logo/' . $identitas['logo'] . '') ?>" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('cart'); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?= $cart->totalItems() ?> Items</a></li>
                    <?php if (!empty(session()->get('pelanggan'))) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/profile/index/' . session()->get('idpelanggan')) ?>">Selamat datang, <?= session()->get('pelanggan'); ?></a></li>
                    <?php endif ?>
                    <?php if (empty(session()->get('pelanggan'))) : ?>
                        <li class="nav-item active"><a class="nav-link" href="<?= base_url('/login') ?>"><i class="fa fa-power-off"></i> Login</a></li>
                    <?php else : ?>
                        <li class="nav-item active"><a class="nav-link" href="<?= base_url('/login/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?= $this->renderSection('navbar') ?>