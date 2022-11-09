<?php include '../templates/admin/admin-header.php' ?>
<?php include '../templates/sidebar.php' ?>

<?php
$query = mysqli_query($connection, "SELECT * FROM tb_suplier");
$getNamaSuplier = $query;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add">
                            Tambah Barang
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
                            <h3 class="card-title">Daftar Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Nama Suplier</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $barang = mysqli_query($connection, "SELECT	
                                    tb_barang.*, 
                                    tb_suplier.nama_suplier 
                                    FROM 
                                    tb_barang 
                                    INNER JOIN 
                                    tb_suplier 
                                    ON 
                                    tb_barang.id_suplier = tb_suplier.id_suplier");
                                    while ($value = mysqli_fetch_assoc($barang)) {
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $value['kode_barang']; ?></td>
                                            <td><?= htmlspecialchars($value['nama_barang']); ?></td>
                                            <td><?= $value['stok']; ?></td>
                                            <td>Rp <?= number_format($value['harga'], 2); ?></td>
                                            <td><?= $value['nama_suplier']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal<?= $value['id_barang']; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm_modal('query/delete-barang.php?id_barang=<?= $value['id_barang']; ?>')">Hapus</button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modal<?= $value['id_barang']; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Edit</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form role="form" method="POST" action="query/update-barang.php">
                                                            <?php
                                                            $id = $value['id_barang'];

                                                            $query_edit = mysqli_query($connection, "SELECT * FROM tb_barang WHERE id_barang = '$id'");
                                                            while ($row = mysqli_fetch_assoc($query_edit)) {
                                                            ?>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="kodebarang">Kode Barang</label>
                                                                        <input type="text" class="d-none" name="id_barang" value="<?= $value['id_barang']; ?>">
                                                                        <input type="text" name="kodebarang" class="form-control" id="kodebarang" value="<?= $row['kode_barang']; ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="namabarang">Nama Barang</label>
                                                                        <input type="text" name="nama_barang" class="form-control" id="namabarang" value="<?= htmlspecialchars($row['nama_barang']); ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="stok">Stok</label>
                                                                        <input type="number" name="stok" class="form-control" id="stok" value="<?= $row['stok']; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="harga">Harga</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">Rp.</span>
                                                                            </div>
                                                                            <input type="text" name="harga" class="form-control" id="harga" value="<?= $row['harga']; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama-suplier">Nama Suplier</label>
                                                                        <select name="id_suplier" id="nama-suplier" class="custom-select">
                                                                            <?php
                                                                            $idSuplier = $value['id_suplier'];
                                                                            $getNamaSuplier = mysqli_query($connection, "SELECT * FROM tb_suplier WHERE id_suplier = '$idSuplier'");
                                                                            while ($suplier = mysqli_fetch_assoc($getNamaSuplier)) {
                                                                            ?>
                                                                                <option value="<?= $suplier['id_suplier']; ?>"><?= $suplier['nama_suplier']; ?></option>
                                                                            <?php } ?>
                                                                        </select>
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
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Nama Suplier</th>
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
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form start -->
                    <form role="form" method="POST" action="query/add-barang.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kodebarang">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" id="kodebarang" placeholder="Kode Barang">
                            </div>
                            <div class="form-group">
                                <label for="namabarang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="namabarang" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group-prepend">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <!-- <input type="text" class="form-control"> -->
                                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama-suplier">Nama Suplier</label>
                                <select name="id_suplier" id="nama-suplier" class="custom-select">

                                    <option selected disabled>Pilih Suplier</option>
                                    <?php
                                    $isup = $query;
                                    // var_dump($isup);
                                    foreach ($isup as $s) :
                                    ?>
                                        <option value="<?= $s['id_suplier']; ?>"><?= $s['nama_suplier']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
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