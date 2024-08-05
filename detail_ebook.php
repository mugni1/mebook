<?php
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

$id = $_GET['id'];

$ebook = read("SELECT buku.*, kategori.* FROM buku INNER JOIN kategori ON buku.kategori_id=kategori.id_kategori WHERE buku.id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <?php require_once "layout/navbar.php" ?>

    <div class=" container my-4">
        <div class="row">
            <!-- cover -->
            <div
                class="container col-md-5 col-lg-3 d-flex justify-content-center justify-content-md-start justify-content-lg-start">
                <img style=" box-shadow:2px 2px 0 black;" src="img/<?= $ebook['cover'] ?>" alt=""
                    class=" border border-black rounded-3 img-fluid">
            </div>
            <!-- end of cover -->

            <!-- info buku -->
            <div class=" container mt-4 mt-md-0 col-md-7 col-lg-9 d-flex flex-column">
                <div class="row">
                    <!-- judul paling atas besar -->
                    <div class="col-12">
                        <h2 class="titillium-web-bold text-body-tertiary"><?= $ebook['judul'] ?></h2>
                        <hr>
                    </div>
                    <!-- judul paling atas besar -->
                    <!-- judul penulis penerbit -->
                    <div class="col-12 col-md-8 d-flex flex-column">
                        <span class="titillium-web-light">Kategori / <a style="text-decoration: none;"
                                href="kategori_ebook.php?id=<?= $ebook['id_kategori'] ?>"><?= $ebook['nama_kategori'] ?></a></span>
                        <b class="titillium-web-semibold">
                            Judul : <?= $ebook['judul'] ?>
                        </b>
                        <b class="titillium-web-semibold">
                            Penulis : <?= $ebook['penulis'] ?>
                        </b>
                        <b class="titillium-web-semibold">
                            Penerbit : <?= $ebook['penerbit'] ?>
                        </b>
                        <div class="d-flex flex-column">
                            <div class="my-2 d-flex flex-column">
                                <b class="text-primary"><i class="bi bi-bookmark-star-fill"></i> Free Ebook</b>
                                <a href="script/download.php?nama=<?= $ebook['file_ebook'] ?>"
                                    class="btn btn-primary">Download</a>
                            </div>
                            <?php if (isset($ebook['link_pembelian'])) { ?>
                            <b class=" text-success"><i class="bi bi-cart3"></i> Anda juga bisa beli buku ini</b>
                            <a href="<?= $ebook['link_pembelian'] ?>" class="btn btn-success">Beli Buku</a>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- judul penulis penerbit -->
                    <?php if (isset($_SESSION['login'])) { ?>
                    <!-- tombol interaksi untuk admin -->
                    <div class="col-12 col-md-4  d-flex flex-column align-items-center">
                        <div class="col-12 d-flex flex-column justify-content-center gap-3 mt-3">
                            <b class="text-center">EDIT ATAU HAPUS EBOOK</b>
                            <a href="form_update.php?id=<?= $id ?>" class="btn btn-warning text-white"><i
                                    class="bi bi-pencil-square"></i> UPDATE</a>
                            <a href="form_hapus.php?id=<?= $id ?>" class="btn btn-danger"><i
                                    class="bi bi-trash-fill"></i> HAPUS</a>
                        </div>
                    </div>
                    <!-- tombol interaksi untuk admin -->
                    <?php } ?>
                </div>
            </div>
            <!-- end of info buku -->
            <!-- dekripsi -->
            <div class="container d-flex flex-column mt-5 mt-md\">
                <h3 class="titillium-web-bold">Deskripsi</h3>
                <p style=" word-wrap: break-word;" class="titillium-web-light">
                    <?= $ebook['deskripsi'] ?>
                </p>
            </div>
            <!-- end of deskripsi -->
        </div>
    </div>


    <!-- footter -->
    <?php require_once "layout/footer.php" ?>
    <!-- end of footer -->

    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>