<?php include '../templates/header.php' ?>
<?php include '../templates/sidebar.php' ?>

<!-- cek apakah sudah login -->
<?php
session_start();

if ($_SESSION['status'] != "login") {
    header("location:../../index.php?pesan=notlogin");
}

include '../../config/Database.php';

$barang = mysqli_query($connection, "SELECT * FROM tb_barang");

$data = mysqli_num_rows($barang);
?>

<div class="ml-200 px-1">
    <p class="font-lg">Daftar Master Barang</p>
</div>

<div class="ml-200 px-1">
    <table>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>

        <?php
        $i = 1;
        foreach ($barang as $value) :
        ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $value['kode_barang']; ?></td>
                <td><?= $value['nama_barang']; ?></td>
                <td><?= $value['stok']; ?></td>
                <td><?= $value['harga']; ?></td>
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