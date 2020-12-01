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
          <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
          <li class="breadcrumb-item active"><?= $title; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  
  <div class="row">
    <div class="col-lg-12">
      <form action="/mahasiswa/simpan" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" name="nama" id="nama" class="form-control<?= ($validation->hasError('nama')) ? ' is-invalid' : '' ?>" value="<?= old('nama'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="form-group">
          <select name="fakultas" id="fakultas" class="form-control<?= ($validation->hasError('jurusan')) ? ' is-invalid' : '' ?>">
            <option value="">-- Pilih Fakultas --</option>
            <?php foreach($fakultas->getResult() as $f) : ?>
              <option value="<?= $f->id_fakultas; ?>"><?= $f->nama_fakultas; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('fakultas'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="jurusan" id="jurusan" class="form-control<?= ($validation->hasError('jurusan')) ? ' is-invalid' : '' ?>">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach($jurusan->getResult() as $f) : ?>
              <option value="<?= $f->id_jurusan; ?>"><?= $f->nama_jurusan; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('jurusan'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="photo">Photo</label>
          <input type="file" name="photo" id="photo" class="form-control-file<?= ($validation->hasError('photo')) ? ' is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('photo'); ?>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- /.content -->