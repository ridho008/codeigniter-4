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
      <form action="/mahasiswa/update/<?= $mahasiswa['id_mahasiswa']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa']; ?>">
        <input type="hidden" name="photoLama" value="<?= $mahasiswa['photo']; ?>">
        <div class="form-group">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" name="nama" id="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>" value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama_mhs'] ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="form-group">
          <select name="fakultas" id="fakultas" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '' ?>">
            <option value="">-- Pilih Fakultas --</option>
            <?php foreach($fakultas->getResult() as $f) : ?>
              <?php if($f->id_fakultas == $mahasiswa['id_fakultas']) : ?>
              <option value="<?= $f->id_fakultas; ?>" selected><?= $f->nama_fakultas; ?></option>
              <?php else : ?>
                <option value="<?= $f->id_fakultas; ?>"><?= $f->nama_fakultas; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('fakultas'); ?>
          </div>
        </div>
        <div class="form-group">
          <select name="jurusan" id="jurusan" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '' ?>">
            <option value="">-- Pilih Jurusan --</option>
            <?php foreach($jurusan->getResult() as $f) : ?>
              <?php if($f->id_jurusan == $mahasiswa['id_jurusan']) : ?>
              <option value="<?= $f->id_jurusan; ?>" selected><?= $f->nama_jurusan; ?></option>
              <?php else: ?>
                <option value="<?= $f->id_jurusan; ?>"><?= $f->nama_jurusan; ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">
            <?= $validation->getError('jurusan'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="photo">Photo</label><br>
          <img src="/assets/img/<?= $mahasiswa['photo']; ?>" width="100">
          <input type="file" name="photo" id="photo" class="form-control-file <?= ($validation->hasError('photo')) ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('photo'); ?>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- /.content -->