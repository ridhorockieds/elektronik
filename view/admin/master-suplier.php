<?php include '../templates/admin/admin-header.php' ?>
<?php include '../templates/admin/admin-sidebar.php' ?> required

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Suplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                            Tambah Suplier
                        </button>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Suplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Suplier</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $getSuplier = mysqli_query($connection, "SELECT * FROM tb_suplier");
                                    foreach ($getSuplier as $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $value['nama_suplier']; ?></td>
                                            <td><?= $value['alamat_suplier']; ?></td>
                                            <td><?= $value['no_telp']; ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal<?= $value['id_suplier']; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm_modal('query/delete-suplier.php?id_suplier=<?= $value['id_suplier']; ?>')">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modal<?= $value['id_suplier']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Edit</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" method="POST" action="query/update-suplier.php">
                                                            <?php
                                                            $id = $value['id_suplier'];
                                                            $query_edit = mysqli_query($connection, "SELECT * FROM tb_suplier WHERE id_suplier = '$id'");
                                                            while ($row = mysqli_fetch_assoc($query_edit)) {
                                                                // print_r($row);
                                                            ?>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="nama_suplier">Nama Suplier</label>
                                                                        <input type="text" class="d-none" name="id_suplier" value="<?= $value['id_suplier']; ?>">
                                                                        <input type="text" name="nama_suplier" class="form-control" id="nama_suplier" value="<?= htmlspecialchars($row['nama_suplier']); ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <input type="text" name="alamat_suplier" class="form-control" id="alamat" value="<?= htmlspecialchars($row['alamat_suplier']); ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="no_telp">Telepon</label>
                                                                        <input type="text" name="no_telp" class="form-control" id="no_telp" value="<?= $row['no_telp']; ?>" required minlength="9" maxlength="14">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Email</label>
                                                                        <div class="input-group-prepend">
                                                                            <input type="text" name="email" class="form-control" id="email" value="<?= $row['email']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="float-right">
                                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                                </div>
                                                            <?php } ?>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal Edit -->
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Suplier</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <!-- Modal Add -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Suplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form role="form" method="POST" action="query/add-suplier.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namasuplier">Nama Suplier</label>
                                <input type="text" name="nama_suplier" class="form-control" id="namasuplier" placeholder="Nama Suplier" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat_suplier" class="form-control" id="alamat" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="no_telp" class="form-control" id="telepon" placeholder="Telepon" required minlength="9" maxlength="14">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group-prepend">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="float-right">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal Add -->

    <!-- Modal Hapus -->
    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <div class="modal-header">
                    <h4 class="modal-title">Apakah Anda yakin ingin menghapus?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4> -->
                </div>

                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger btn-sm" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal Hapus -->
</div>
<!-- /.content-wrapper -->
<!-- Javascript untuk popup modal Delete-->
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>

<?php include '../templates/footer.php' ?>