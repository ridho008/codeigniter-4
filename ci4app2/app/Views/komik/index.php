<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<a href="/komik/create" class="btn btn-primary mb-3">Tambah Data Komik</a>
			<h3>Daftar Komik</h3>
			<?php if(session()->getFlashdata('pesan')) : ?>
			<div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
			<?php endif; ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Gambar</th>
						<th>Judul</th>
						<th>Aksi</th>
					</tr>
					<?php $i = 1; foreach($komik as $k) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td>
								<img src="/assets/img/<?= $k['sampul']; ?>" class="sampul">
							</td>
							<td><?= $k['judul']; ?></td>
							<td>
								<a href="/komik/<?= $k['slug']; ?>">Detail</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>