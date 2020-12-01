<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form action="/orang/update/<?= $orang['id']; ?>" method="post">
				<?= csrf_field(); ?>
				<input type="hidden" name="id" value="<?= $orang['id']; ?>">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" value="<?= (old('nama')) ? old('nama') : $orang['nama'] ?>">
					<div class="invalid-feedback">
						<?= $validation->getError('nama'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>" value="<?= (old('nama')) ? old('nama') : $orang['alamat']; ?>">
					<div class="invalid-feedback">
						<?= $validation->getError('alamat'); ?>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>