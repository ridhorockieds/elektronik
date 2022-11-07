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
                while ($row = mysqli_fetch_array($query_edit)) {
                    // print_r($row);

                ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kodebarang">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" id="kodebarang" value="<?= $row['kode_barang']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namabarang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="namabarang" value="<?= $row['nama_barang']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" id="stok" value="<?= $row['stok']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="harga" class="form-control" id="harga" value="<?= $row['harga']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama-suplier">Nama Suplier</label>
                            <select name="id_suplier" id="nama-suplier" class="custom-select">

                                <option selected disabled>Pilih Suplier</option>
                                <?php
                                while ($suplier = mysqli_fetch_array($getNamaSuplier)) {
                                ?>
                                    <option value="<?= $suplier['id_suplier']; ?>"><?= $suplier['id_suplier'] . " - " . $suplier['nama_suplier'] . " - " . $suplier['email']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<!-- /.modal-dialog -->