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
				<div class="card">
					<div class="card-header">
						<h3>Sign In</h3>
					</div>
					<div class="card-body">
						<div class="col">
							<?php
							if (!empty($info)) {
								echo '<div class="alert alert-danger" role="alert">';
								echo $info;
								echo '</div>';
							}
							?>
						</div>
						<form method="post" action="<?= base_url('/login/index') ?>">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-envelope"></i></span>
								</div>
								<input type="text" class="form-control" name="email" placeholder="email" required="required">

							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-key"></i></span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="password" required="required">
							</div>
							<div class="form-group">
								<input type="submit" value="Login" name="login" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Tidak punya akun?<a href="<?= base_url('registrasi') ?>">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center links">
							<a href="<?= base_url('forgot') ?>">Lupa password?</a>
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