<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Selamat Datang, <?= session()->get('user'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Level : <?= session()->get('level'); ?></a>
          <hr>
          <a class="dropdown-item" href="<?= base_url('/admin/login/logout') ?>" style="color: blue">Log Out</a>
        </div>
      </li>
  </ul>
  <!-- Right navbar links -->
</nav>
<?= $this->renderSection('admin_navbar') ?>