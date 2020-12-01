<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= $title; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Blank Page</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-primary">
					<div class="card-header">
						<h6>Multiple Uploads</h6>
					</div>
					<div class="card-body">
					  <?php if(session()->has('pesan')) : ?>
            <div class="alert alert-success" role="alert"><?= session()->get('pesan'); ?></div>
					  <?php endif; ?>
						<form action="/uploads/multiple" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="judul">Judul</label>
								<input type="text" name="judul" id="judul" class="form-control<?= ($validation->hasError('judul')) ? ' is-invalid' : '' ?>">
								<div class="invalid-feedback">
                  <?= $validation->getError('judul'); ?>
                </div>
							</div>
							<div class="form-group">
								<label for="gambar">Gambar</label>
								<input type="file" name="gambar[]" id="gambar" class="form-control-file<?= ($validation->hasError('judul')) ? ' is-invalid' : '' ?>" multiple="true">
								<div class="invalid-feedback">
                  <?= $validation->getError('gambar'); ?>
                </div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<?= $this->endSection(); ?>
<!-- /.content -->