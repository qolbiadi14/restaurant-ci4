<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
	<!-- Start header -->
	<?= $this->include('template/navbar') ?>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container">
			<?php if ($cart->totalItems() === 0) : ?>
				<div class="alert alert-warning" role="alert">
					Keranjang Anda masih kosong silahkan belanja di <a href="<?= base_url('homepage') ?>" class="alert-link">Beranda</a>
				</div>
			<?php else : ?>
				<div class="d-flex justify-content-center h-100">
					<div class="card">
						<div class="card-header">
							<h3>Pembayaran</h3>
						</div>
						<div class="card-body">
							<div class="content">
								<div class="col">
									<?php foreach ($cart->contents() as $item) : ?>
										<div class="col">
											<h4 style="color: black;"><?= $item['name']; ?></h4>
										</div>
										<div class="col">
											<h4 style="color: black;">Rp. <?php echo number_format($item['qty'] * $item['price'], 0, 0, '.'); ?></h4>
										</div>
										<hr>
									<?php endforeach ?>
								</div>
								<ul>
									<li class="last">
										<h3 style="color: black;">Total Rp. <?php echo number_format($cart->total(), 0, 0, '.'); ?></h3>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-footer">
							<form action="<?= base_url('/checkout/proceed') ?>" method="post">
								<div class="form-group">
									<input type="submit" value="Bayar" class="btn float-right login_btn">
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php endif ?>
		</div>
	</div>
	<!-- End All Pages -->

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