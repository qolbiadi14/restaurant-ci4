<?= $this->extend('template/header') ?>

<?= $this->section('header') ?>

<body>
	<!-- Start header -->
	<?= $this->include('template/navbar') ?>
	<!-- End header -->

	<!-- Shopping Cart -->

	<section class="pt-5 pb-5" style="background-color: beige;">
		<div class="container mt-5">
			<?php if ($cart->totalItems() === 0) : ?>
				<div class="alert alert-warning" role="alert">
					Keranjang Anda masih kosong silahkan belanja di <a href="<?= base_url('homepage') ?>" class="alert-link">Beranda</a>
				</div>
			<?php else : ?>
				<div class="row w-100">
					<div class="col-lg-12 col-md-12 col-12">
						<h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
						<p class="mb-5 text-center">
							<i class="text-warning font-weight-bold"><?= $cart->totalItems() ?></i> items in your cart</p>
						<table id="shoppingCart" class="table table-condensed table-responsive">
							<thead>
								<tr>
									<th style="width:60%">Product</th>
									<th style="width:12%">Price</th>
									<th style="width:10%">Quantity</th>
									<th style="width:10%"></th>
									<th style="width:6%"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cart->contents() as $item) : ?>
									<tr>
										<td data-th="Product">
											<div class="row">
												<div class="col-md-3 text-left">
													<img src="<?= base_url('/upload/' . $item['gambar'] . '') ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
												</div>
												<div class="col-md-9 text-left mt-sm-2">
													<h4><?= $item['name']; ?></h4>
												</div>
											</div>
										</td>
										<td data-th="Price">Rp. <?php echo number_format($item['qty'] * $item['price'], 0, 0, '.'); ?></td>
										<td data-th="Quantity">
											<div class="row mx-auto">
												<input type="text" style="width: 50px;  padding: 0px; margin: 0 10px;" class="form-control form-control-lg text-center" value="<?= $item['qty']; ?>">
											</div>
										</td>
										<td class="actions" data-th="">
											<div class="row mx-auto">
												<?php echo anchor('/cart/kurang/' . $item['qty'] . '/' . $item['rowid'], '<span style="padding: 5px 11px; margin-right: 2px;" class="btn btn-primary">-</span>') ?>
												<?php echo anchor('/cart/tambah/' . $item['qty'] . '/' . $item['rowid'], '<span style="padding: 5px 10px;" class="btn btn-success">+</span>') ?>
											</div>
										</td>
										<td class="actions" data-th="">
											<div class="row mx-auto">
												<?php echo anchor('/cart/remove/' . $item['rowid'], '<span style="padding: 5px 10px;" class="btn btn-warning"><i class="fa fa-trash"></i></span>') ?>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<div class="float-right text-right">
							<h4>Subtotal:</h4>
							<h1>Rp. <?php echo number_format($cart->total(), 0, 0, '.'); ?></h1>
						</div>
					</div>
				</div>
				<div class="row mt-4 d-flex align-items-center">
					<div class="col-sm-6 order-md-2 text-right">
						<a href="<?= base_url('/checkout/index') ?>" class="btn btn-warning mb-4 btn-lg pl-5 pr-5">Checkout</a>
					</div>
					<div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
						<a href="<?= base_url('homepage') ?>">
							<i class="fa fa-arrow-left mr-2"></i> Continue Shopping</a>
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