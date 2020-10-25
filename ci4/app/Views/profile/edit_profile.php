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
				<div class="card col-sm-8 col-md-7 col-lg-6 col-12">
					<div class="card-header">
						<h3>Sign In</h3>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('profile/update') ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class="form-control" name="pelanggan" value="<?= $pelanggan['pelanggan'] ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-map-marker"></i></span>
										</div>
										<input type="text" class="form-control" name="alamat" value="<?= $pelanggan['alamat'] ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-phone-square"></i></span>
										</div>
										<input type="text" class="form-control" name="telp" value="<?= $pelanggan['telp'] ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-envelope"></i></span>
										</div>
										<input type="text" class="form-control" name="email" value="<?= $pelanggan['email'] ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-key"></i></span>
										</div>
										<input type="password" class="form-control" name="password" value="<?= $pelanggan['password'] ?>" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-camera"></i></span>
										</div>
										<input type="file" name="foto" placeholder="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Ubah" name="simpan" class="btn float-right login_btn">
								<input type="hidden" name="foto" value="<?= $pelanggan['foto'] ?>">
								<input type="hidden" name="idpelanggan" value="<?= $pelanggan['idpelanggan'] ?>">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							<a href="<?= base_url('/profile/index/' . session()->get('idpelanggan')) ?>">Kembali ke profil</a>
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