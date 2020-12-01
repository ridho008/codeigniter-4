<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<h2>Form Tambah Data Komik</h2>
			<form action="/komik/save" method="post" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="form-group">
					<label for="judul">Judul</label>
					<input type="text" name="judul" id="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ' ' ?>" autofocus="on" value="<?= old('judul'); ?>">
					<div class="invalid-feedback">
						<?= $validation->getError('judul'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="penulis">Penulis</label>
					<input type="text" name="penulis" id="penulis" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : '' ?>" value="<?= old('penulis'); ?>">
					<div class="invalid-feedback">
						<?= $validation->getError('penulis'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="penerbit">Penerbit</label>
					<input type="text" name="penerbit" id="penerbit" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : '' ?>" value="<?= old('penerbit'); ?>">
					<div class="invalid-feedback">
						<?= $validation->getError('penerbit'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
					<div class="col-sm-2">
						<img src="/assets/img/default.png" class="img-thumbnail img-priview">
					</div>
					<div class="col-sm-8">
						<div class="custom-file">
							<input type="file" name="sampul" id="sampul" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : '' ?>" value="<?= old('sampul'); ?>" onchange="priviewImg()">
							<div class="invalid-feedback">
								<?= $validation->getError('sampul'); ?>
							</div>
							<label for="sampul" class="custom-file-label">Pilih Foto</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>