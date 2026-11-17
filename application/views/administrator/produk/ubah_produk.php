<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama produk</label>
                                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $produk['nama'] ?>" aria-describedby="Nama produk">
                                    <small class="text-danger"><em><?= form_error('nama_produk') ?></em></small>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_produk" class="form-label">Kategori produk</label>
                                    <select class="form-select" name="kategori_produk" id="kategori_produk">
                                        <option value="">-- pilih kategori --</option>
                                        <?php foreach ($list_kategori as $kategori) : ?>
                                            <option value="<?= $kategori['id_kategori'] ?>" <?= ($produk['categori_id'] == $kategori['id_kategori']) ? 'selected' : '' ?>><?= $kategori['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <small class="text-danger"><em><?= form_error('kategori_produk') ?></em></small>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_produk" class="form-label">Harga</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                        <input type="number" name="harga_produk" id="harga_produk" class="form-control" value="<?= $produk['harga'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stok_produk" class="form-label">Stok produk</label>
                                    <input type="number" class="form-control" name="stok_produk" id="stok_produk" value="<?= $produk['stok'] ?>" aria-describedby="Stok produk">
                                    <small class="text-danger"><em><?= form_error('stok_produk') ?></em></small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Gambar saat ini</label>
                                    <div class="d-flex flex-wrap">
                                        <?php foreach ($gambar_model->get_by_produk_id($produk['id_produk']) as $gambar) : ?>
                                            <div class="me-3 mb-3 text-center">
                                                <img src="<?= base_url('uploads/produk/') . $gambar['nama_gambar'] ?>" alt="" style="width:120px;height:120px;object-fit:cover;" class="img-thumbnail d-block mb-1">
                                                <a href="<?= base_url('admin/produk/hapus_gambar/') . $gambar['id_gambar'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus gambar ini?')">Hapus</a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_produk" class="form-label">Tambah Gambar Baru</label>
                                    <input class="form-control" type="file" id="gambar_produk" name="gambar_produk[]" multiple>
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi_produk" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi_produk" id="deskripsi_produk" cols="30" rows="10" class="form-control"><?= $produk['deskripsi'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('admin/produk') ?>" class="btn btn-danger">Kembali</a>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->