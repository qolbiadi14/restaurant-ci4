<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
	<!-- Start header -->
	<?= $this->include('template/navbar') ?>
	<!-- End header -->

	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<?php foreach ($slider as $s) : ?>
				<li class="text-left">
					<img src="<?= base_url('/img/slider/' . $s['slider'] . '') ?>" alt="">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="m-b-20"><strong>Selamat datang di <br> <?= $identitas['namatoko'] ?></strong></h1>
								<p class="m-b-40">Kami selalu memberikan pengalaman terbaik <br> dalam membuat masakan kesukaan anda.</p>
							</div>
						</div>
					</div>
				</li>
			<?php endforeach ?>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->

	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-7 col-md-7 col-sm-12 text-center">
					<div class="inner-column">
						<h1 style="color: red;">Hai! Selamat Berbelanja di <span style="color: black;"><?= $identitas['namatoko'] ?></span></h1>
						<h4 style="color: red;">Kami mengutamakan kualitas produk </h4>
						<p style="color: red;"><?= $identitas['deskripsitoko'] ?></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->

	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->

	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Daftar Menu</h2>
						<p>Berikut Adalah Daftar Menu di Restoran Kami</p>
					</div>
				</div>
			</div>

			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Semua Menu</a>
						<?php foreach ($kategori as $k) : ?>
							<a class="nav-link" id="v-pills-<?= $k['idkategori'] ?>-tab" data-toggle="pill" href="#v-pills-<?= $k['idkategori'] ?>" role="tab" aria-controls="v-pills-<?= $k['idkategori'] ?>" aria-selected="false"><?= $k['kategori'] ?></a>
						<?php endforeach ?>
					</div>
				</div>

				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<?php foreach ($allmenu as $key => $value) : ?>
									<div class="col-lg-4 col-md-6 special-grid drinks">
										<div class="gallery-single fix">
											<img src="<?= base_url('/upload/' . $value['gambar'] . '') ?>" class="img-fluid" alt="Image">
											<div class="why-text">
												<h4><?= $value['menu'] ?></h4>
												<p><a style="margin-right: 5px;" title="Tambah ke keranjang" href="<?= base_url('cart/buy/' . $value['idmenu']) ?>">Beli <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
													<a title="Lihat Produk" href="<?= base_url('productdetail/index/' . $value['idmenu']) ?>">Lihat Produk <i class="fa fa-eye" aria-hidden="true"></i></a></p>
												<h5>Rp. <?= $value['harga'] ?></h5>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div class="row justify-content-center">
								<?= $pager->links('page', 'pelanggan') ?>
							</div>
						</div>
						<?php foreach ($kategori as $k) : ?>
							<div class="tab-pane fade" id="v-pills-<?= $k['idkategori'] ?>" role="tabpanel" aria-labelledby="v-pills-<?= $k['idkategori'] ?>-tab">
								<div class="row">
									<?php foreach ($menu as $m) : ?>
										<?php if ($m['idkategori'] === $k['idkategori']) : ?>
											<div class="col-lg-4 col-md-6 special-grid drinks">
												<div class="gallery-single fix">
													<img src="<?= base_url('/upload/' . $m['gambar'] . '') ?>" class="img-fluid" alt="Image">
													<div class="why-text">
														<h4><?= $value['menu'] ?></h4>
														<p><a style="margin-right: 5px;" title="Tambah ke keranjang" href="<?= base_url('cart/buy/' . $m['idmenu']) ?>">Beli <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
															<a title="Lihat Produk" href="<?= base_url('productdetail/index/' . $m['idmenu']) ?>">Lihat Produk <i class="fa fa-eye" aria-hidden="true"></i></a></p>
														<h5>Rp. <?= $m['harga'] ?></h5>
													</div>
												</div>
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End Menu -->


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