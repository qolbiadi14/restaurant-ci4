<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="<?= base_url('/img/icon/' . $identity['icon'] . '') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $identity['namatoko'] ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php $level = session()->get('level');
        if ($level === 'Admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/identitas') ?>" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>identitas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/slider') ?>" class="nav-link">
              <i class="nav-icon far fa-images"></i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/menu') ?>" class="nav-link">
              <i class="nav-icon fas fa-utensils"></i>
              <p>Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/user') ?>" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/order') ?>" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/orderdetail') ?>" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>Order Detail</p>
            </a>
          </li>
        <?php endif ?>
        <?php if ($level === 'Kasir') : ?>
          <li class="nav-item">
            <a href="<?= base_url('kasir') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kasir/order') ?>" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kasir/orderdetail') ?>" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>Order Detail</p>
            </a>
          </li>
        <?php endif ?>
        <?php if ($level === 'Koki') : ?>
          <li class="nav-item">
            <a href="<?= base_url('koki') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('koki/orderdetail') ?>" class="nav-link">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>Order Detail</p>
            </a>
          </li>
        <?php endif ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<?= $this->renderSection('admin_sidebar') ?>