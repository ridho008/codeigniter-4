<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Contact Us</h1>
			<?php foreach($alamat as $a) : ?>
				<ul>
					<li><?= $a['tipe']; ?></li>
					<li><?= $a['alamat']; ?></li>
					<li><?= $a['kota']; ?></li>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>