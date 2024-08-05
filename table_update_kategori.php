<?php 
session_start();
require_once "script/function.php";

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

$kategoris = read("SELECT * FROM `kategori`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <?php require_once "layout/navbar.php" ?>

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div
            class="container col-12 col-md-10 col-lg-5 my-2 py-3 d-flex flex-column justify-content-center align-items-center">
            <a href="form_tambah_kategori.php" class="btn btn-primary my-3">Tambah kategori</a>
            <table class=" table-bordered">
                <tr>
                    <th class="px-2" align="center">No</th>
                    <th class="px-2" align="center">Nama Kategori</th>
                    <th align="center" colspan="2" class="px-2">Interaksi</th>
                </tr>
                <?php $no=0; ?>
                <?php foreach($kategoris as $kategori){ 
                $no++;?>
                <tr>
                    <td class="px-2"><?= $no ?></>
                    <td class="px-2"><?= $kategori['nama_kategori'] ?></td>
                    <td align="center" class="py-2 px-3"><a class="btn btn-warning"
                            href="form_update_kategori.php?id=<?= $kategori['id_kategori'] ?>">Update</a></td>
                    <td align="center" class="py-2 px-3"><a class="btn btn-danger"
                            href="form_hapus_kategori.php?id=<?= $kategori['id_kategori'] ?>">Delete</a></td>
                </tr>
                <?php } ?>

            </table>
            <i class="  text-danger">Note : pastikan kategori sudah tidak tersambung atau tidak di gunakan oleh
                ebook</i>
        </div>
    </div>


    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>