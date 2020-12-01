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
  <?= $validation->listErrors(); ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Product</h3>
        </div>
        <div class="card-header">
          <form action="/product/save" method="post">
          <div class="form-group">
            <label for="name">Name Product</label>
            <input type="text" name="name" id="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('name'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="desc">Description Product</label>
            <input type="text" name="desc" id="desc" class="form-control <?= ($validation->hasError('desc')) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('desc'); ?>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- /.content -->