<?= $this->extend('layout/themeplate'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<h3>Detail Komik</h3>
			<div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="/assets/img/<?= $komik['sampul']; ?>" class="card-img" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?= $komik['judul']; ?></h5>
			        <p class="card-text">Penulis : <?= $komik['penulis']; ?></p>
			        <p class="card-text"><small class="text-muted">Penerbit : <?= $komik['penerbit']; ?></small></p>
			        <a href="/komik" class="btn btn-success">Kembali</a>
			        <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-info">Edit</a>
			        <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
			        	<?= csrf_field(); ?>
			        	<input type="hidden" name="_method" value="DELETE">
			        	<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin ?')">Hapus</button>
			        <!-- <a href="/komik/delete/<?= $komik['id']; ?>" class="btn btn-danger">Hapus</a> -->
			        </form>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>