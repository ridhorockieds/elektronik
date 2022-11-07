<?php include '../templates/admin/admin-header.php' ?>
<?php include '../templates/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                            Tambah User
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
                            <h3 class="card-title">Daftar User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $getUser = mysqli_query($connection, "SELECT * FROM tb_user");
                                    foreach ($getUser as $value) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $value['nama_user']; ?></td>
                                            <td><?= $value['username']; ?></td>
                                            <td><?= $value['password']; ?></td>
                                            <td><?= $value['role']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal<?= $value['id_user']; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm_modal('query/delete-user.php?id_user=<?= $value['id_user']; ?>')">Hapus</button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modal<?= $value['id_user']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Edit</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" method="POST" action="query/update-user.php">
                                                            <?php
                                                            $id = $value['id_user'];
                                                            $query_edit = mysqli_query($connection, "SELECT * FROM tb_user WHERE id_user = '$id'");
                                                            while ($row = mysqli_fetch_assoc($query_edit)) {
                                                            ?>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="nama_user">Nama User</label>
                                                                        <input type="text" class="d-none" name="id_user" value="<?= $value['id_user']; ?>">
                                                                        <input type="text" name="nama_user" class="form-control" id="nama_user" value="<?= htmlspecialchars($row['nama_user']); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" name="username" class="form-control" id="username" value="<?= htmlspecialchars($row['username']); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="password">Password</label>
                                                                        <input type="text" name="password" class="form-control" id="password" value="<?= $row['password']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="role">Role</label>
                                                                        <input type="text" name="role" id="role" class="form-control" readonly value="<?= $row['role']; ?>">
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class=" card-footer float-right">
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
                                        <th>Nama User</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
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
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form role="form" method="POST" action="query/add-user.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_user">Nama Lengkap</label>
                                <input type="text" name="id_user" class="form-control d-none" id="id_user">
                                <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="custom-select">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer float-right">
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