<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
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
                            <h5 class="card-title">Tambah Kota</h5>

                            <p class="card-text">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="nama_kota066" class="form-label">Nama Kota</label>
                                        <input type="text" class="form-control" name="nama_kota066" id="nama_kota066" aria-describedby="Nama Kota">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kota066" class="form-label">Jenis Kota</label>
                                        <select name="jenis_kota066" id="jenis_kota066" class="form-control">
                                            <option value="Kota">Kota</option>
                                            <option value="Kabupaten">Kabupaten</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="provinsi066" class="form-label">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi066" id="provinsi066" maxlength="10" aria-describedby="Provinsi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status066" class="form-label">Status</label>
                                        <select name="status066" id="status066" class="form-control">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a href="<?= base_url('admin/kota') ?>" class="btn btn-danger">Kembali</a>
                                </form>
                            </p>
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