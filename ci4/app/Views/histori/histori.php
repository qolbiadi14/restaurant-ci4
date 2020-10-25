<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
	<!-- Start header -->
	<?= $this->include('template/navbar') ?>
	<!-- End header -->

	<!-- Shopping Cart -->

	<section class="pt-5 pb-5 background-color: beige;">
		<div class="container mt-5">
			<?php if ($count < 1) : ?>
				<div class="alert alert-warning" role="alert">
					Hostori Belanja Anda masih kosong silahkan belanja di <a href="<?= base_url('homepage') ?>" class="alert-link">Beranda</a>
				</div>
			<?php else : ?>
				<div class="row w-100">
					<div class="col-lg-12 col-md-12 col-12">
						<table id="shoppingCart" class="table table-condensed table-responsive">
							<thead>
								<tr>
									<th style="width:60%">Prooduk</th>
									<th style="width:12%">Harga</th>
									<th style="width:10%">Jumlah</th>
									<th style="width:16%">Tanggal Beli</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($histori as $item) : ?>
									<tr>
										<td data-th="Product">
											<div class="row">
												<div class="col-md-3 text-left">
													<img src="<?= base_url('/upload/' . $item['gambar'] . '') ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
												</div>
												<div class="col-md-9 text-left mt-sm-2">
													<h4><?= $item['menu']; ?></h4>
												</div>
											</div>
										</td>
										<td data-th="Price">Rp. <?php echo number_format($item['harga'], 0, 0, '.'); ?></td>
										<td data-th="Quantity">
											<?= $item['jumlah']; ?>
										</td>
										<td class="actions" data-th="">
											<?= $item['tglorder']; ?>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row mt-4 d-flex align-items-center">
					<div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
						<a href="<?= base_url('/profile/index/' . session()->get('idpelanggan')) ?>">
							<i class="fa fa-arrow-left mr-2"></i> Kembali ke profil</a>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>

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