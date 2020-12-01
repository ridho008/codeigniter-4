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
    <div class="col-lg-6">
      <a href="/mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Photo</th>
              <th>Mahasiswa</th>
              <th>Fakultas</th>
              <th>Jurusan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach($mahasiswa as $m) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td>
                  <img src="/assets/img/<?= $m['photo']; ?>" width="100">
                </td>
                <td><?= $m['nama_mhs']; ?></td>
                <td><?= $m['id_fakultas']; ?></td>
                <td><?= $m['id_jurusan']; ?></td>
                <td>
                  <a href="/mahasiswa/edit/<?= $m['id_mahasiswa']; ?>" class="btn btn-info">Edit</a>
                  <form action="/mahasiswa/hapus/<?= $m['id_mahasiswa']; ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
            <?= $pager->links(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- /.content -->