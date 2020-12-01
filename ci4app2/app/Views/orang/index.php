<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-12">
			<h3>Daftar Orang</h3>
			<a href="/orang/create" class="btn btn-primary">Tambah Data Orang</a>
			<form action="" method="post">
				<div class="input-group mb-3">
				  <input type="text" name="keyword" class="form-control" placeholder="Cari" autofocus="on" autocomplete="off">
				  <div class="input-group-append">
				    <button type="submit" name="submit" class="btn btn-outline-secondary">Cari</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<?php if(session()->getFlashdata('pesan')) : ?>
			<div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
			<?php endif; ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
					<?php $i = 1 + (5 * ($currentPage - 1)); foreach($orang as $o) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $o['nama']; ?></td>
							<td><?= $o['alamat']; ?></td>
							<td>
								<a href="/orang/edit/<?= $o['id']; ?>" class="btn btn-info">Edit</a>
								<form action="/orang/delete/<?= $o['id']; ?>" method="post">
									<?= csrf_field(); ?>
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</button>
								</form>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?= $pager->links('orang', 'orang_pagination'); ?>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>