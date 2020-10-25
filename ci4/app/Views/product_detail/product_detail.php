<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
	<!-- Start header -->
	<?= $this->include('template/navbar') ?>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card mb-4" style="width: 950px;">
					<h2 class="card-header text-center" style="color: white;">Detail Menu</h2>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<img style="width: 250px; height: auto;" src="<?= base_url('/upload/' . $menu['gambar'] . '') ?>" class="rounded mx-auto my-2 d-block">
							</div>
							<div class="col-md-8">
								<table class="table">
									<tr>
										<td style="vertical-align: middle" style="color: white;">
											<h4 style="color: black;">Nama Produk</h4>
										</td>
										<td style="vertical-align: middle" style="color: white;"><strong>
												<h4 style="color: black;"><?= $menu['menu'] ?></h4>
											</strong></td>
									</tr>
									<tr>
										<td style="vertical-align: middle" style="color: white;">
											<h4 style="color: black;">Harga</h4>
										</td>
										<td style="vertical-align: middle" style="color: white;"><strong>
												<h4 style="color: black;">Rp. <?= $menu['harga'] ?></h4>
											</strong></td>
									</tr>
									<tr>
										<td style="vertical-align: middle" colspan="2">
											<a href="<?= base_url('cart/buy/' . $menu['idmenu']) ?>" class="btn btn-warning">Beli</a>
											<a href="<?= base_url('/') ?>" class="btn btn-warning">Kembali</a>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
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