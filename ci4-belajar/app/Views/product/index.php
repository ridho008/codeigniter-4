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
      <a href="/product/create" class="btn btn-primary">Add New Product</a>
      <?php if(session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success mt-1" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
      <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach($product as $p) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['product_name']; ?></td>
                <td><?= $p['product_desc']; ?></td>
                <td>
                  <a href="/product/edit/<?= $p['id_product']; ?>" class="btn btn-info btn-sm">Edit</a>
                  <form action="/product/delete/<?= $p['id_product']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
<!-- /.content -->