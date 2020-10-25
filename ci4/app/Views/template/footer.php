<!-- Start Footer -->
<footer class="footer-area bg-f">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<h3>Tentang Kami</h3>
				<p><?= $identitas['deskripsitoko'] ?></p>
			</div>
			<div class="col-lg-4 col-md-6">
				<h3>Informasi Kontak</h3>
				<p class="lead"><?= $identitas['alamattoko'] ?></p>
				<p class="lead"><a href="#"><?= $identitas['nomortoko'] ?></a></p>
				<p><a href="#"> <?= $identitas['emailtoko'] ?></a></p>
			</div>
			<div class="col-lg-4 col-md-6">
				<h3>Jam Buka Toko</h3>
				<p><span class="text-color">Sen-Sel :</span> 4:AM - 10PM</p>
				<p><span class="text-color">Rab-Kam :</span> 4:AM - 10PM</p>
				<p><span class="text-color">Jum :</span> 4:AM - 5PM</p>
				<p><span class="text-color">Sab-Min :</span> 5:PM - 11PM</p>
			</div>
		</div>
	</div>

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By :
						<a href="https://html.design/">html design</a></p>
				</div>
			</div>
		</div>
	</div>

</footer>
<!-- End Footer -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

<!-- ALL JS FILES -->
<script src="<?= base_url('/template/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?= base_url('/template/js/popper.min.js') ?>"></script>
<script src="<?= base_url('/template/js/bootstrap.min.js') ?>"></script>
<!-- ALL PLUGINS -->
<script src="<?= base_url('/template/js/jquery.superslides.min.js') ?>"></script>
<script src="<?= base_url('/template/js/images-loded.min.js') ?>"></script>
<script src="<?= base_url('/template/js/isotope.min.js') ?>"></script>
<script src="<?= base_url('/template/js/baguetteBox.min.js') ?>"></script>
<script src="<?= base_url('/template/js/form-validator.min.js') ?>"></script>
<script src="<?= base_url('/template/js/contact-form-script.js') ?>"></script>
<script src="<?= base_url('/template/js/custom.js') ?>"></script>
</body>

</html>
<?= $this->renderSection('footer') ?>