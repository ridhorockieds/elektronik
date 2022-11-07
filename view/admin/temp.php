<?php include '../templates/header.php' ?>
<?php include '../templates/sidebar.php' ?>

<!-- cek apakah sudah login -->
<?php
session_start();

if ($_SESSION['status'] != "login") {
    header("location:../../index.php?pesan=notlogin");
}

include '../../config/Database.php';

$barang = mysqli_query($connection, "SELECT
	tb_barang.kode_barang, 
	tb_barang.nama_barang, 
	tb_barang.stok, 
	tb_barang.harga,tb_suplier.nama_suplier
FROM
	tb_barang
	INNER JOIN
	tb_suplier
	ON 
		tb_barang.id_suplier = tb_suplier.id_suplier");

$data = mysqli_num_rows($barang);
?>

<div class="ml-200 px-1 flex justify-between align-center">
    <div class="title">
        <p class="font-lg">Daftar Master Barang</p>
    </div>
    <div class="add">
        <button class="btn" id="tambah" data-target="#ModalAdd" data-toggle="modal">Tambah Barang</button>
    </div>
</div>

<div class="ml-200 px-1">
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Suplier</th>
            <th>Action</th>
        </tr>

        <?php
        $i = 1;
        foreach ($barang as $value) :
            // var_dump($value);
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['stok']; ?></td>
                <td>Rp <?= number_format($value['harga'], 2); ?></td>
                <td><?= $value['nama_suplier']; ?></td>
                <td class="">
                    <div class="act">
                        <a href="#" class="action warning">Edit</a>
                    </div>
                    <div class="act">
                        <a href="#" class="action danger">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </table>
</div>


<?php include '../templates/footer.php' ?>