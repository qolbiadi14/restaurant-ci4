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
				<div class="card mb-4" style="width: 1100px;">
					<h2 class="card-header text-center" style="color: white;">Profil Pribadi</h2>
					<div class="card-body">
						<div class="row">
							<div class="col-md-3">
								<?php if ($pelanggan['foto'] == '') : ?>
									<img style="width: 250px; height: auto;" src="<?= base_url('/upload/profile/default.png') ?>" class="rounded mx-auto my-2 d-block">
								<?php else : ?>
									<img style="width: 250px; height: auto;" src="<?= base_url('/upload/profile/' . $pelanggan['foto'] . '') ?>" class="rounded mx-auto my-2 d-block">
								<?php endif ?>
							</div>
							<div class="col-md-9">
								<table class="table">
									<tr>
										<td style="vertical-align: middle">
											<h4 style="color: black;">Nama</h4>
										</td>
										<td style="vertical-align: middle">
											<h4 style="color: black;"><?= $pelanggan['pelanggan'] ?></h4>
										</td>
									</tr>
									<tr>
										<td style="vertical-align: middle">
											<h4 style="color: black;">Alamat</h4>
										</td>
										<td style="vertical-align: middle">
											<h4 style="color: black;"><?= $pelanggan['alamat'] ?></h4>
										</td>
									</tr>
									<tr>
										<td style="vertical-align: middle">
											<h4 style="color: black;">Nomor Telepon</h4>
										</td>
										<td style="vertical-align: middle">
											<h4 style="color: black;"><?= $pelanggan['telp'] ?></h4>
										</td>
									</tr>
									<tr>
										<td style="vertical-align: middle">
											<h4 style="color: black;">E-mail</h4>
										</td>
										<td style="vertical-align: middle">
											<h4 style="color: black;"><?= $pelanggan['email'] ?></h4>
										</td>
									</tr>
									<tr>
										<td style="vertical-align: middle">
											<h4 style="color: black;">Password</h4>
										</td>
										<td style="vertical-align: middle">
											<h4 style="color: black;"><?= $pelanggan['password'] ?></h4>
										</td>
									</tr>
									<tr>
										<td style="vertical-align: middle" colspan="3">
											<a href="<?= base_url('profile/edit/' . $pelanggan['idpelanggan']) ?>" class="btn btn-warning">Edit Profil</a>
											<a href="<?= base_url('histori/index/' . $pelanggan['idpelanggan']) ?>" class="btn btn-warning">Histori Belanja</a>
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