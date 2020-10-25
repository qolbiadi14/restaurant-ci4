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
						<div class="col">
							<?php
							if (!empty(session()->getFlashdata('info'))) {
								echo '<div class="alert alert-danger" role="alert">';
								$error = session()->getFlashdata('info');
								foreach ($error as $key => $value) {
									echo $key . " => " . $value;
									echo "<br>";
								}
								echo '</div>';
							}
							?>
						</div>
						<form method="post" action="<?= base_url('/registrasi/insert') ?>">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" class="form-control" name="pelanggan" placeholder="Nama Anda" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-map-marker"></i></span>
										</div>
										<input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-phone-square"></i></span>
										</div>
										<input type="text" class="form-control" name="telp" placeholder="Nomer Telepon" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-envelope"></i></span>
										</div>
										<input type="text" class="form-control" name="email" placeholder="Email" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-key"></i></span>
										</div>
										<input type="password" class="form-control" name="password" placeholder="Password" required="required">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-key"></i></span>
										</div>
										<input type="password" class="form-control" name="konfirmasi" placeholder="Konfirmasi Password" required="required">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Registrasi" name="submit" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Sudah punya akun?<a href="<?= base_url('login') ?>">Sign In</a>
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