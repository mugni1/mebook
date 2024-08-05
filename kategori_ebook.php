<?php 
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

$id = $_GET['id'];

$kategori = read("SELECT * FROM `kategori` WHERE id_kategori = $id");

$ebooks = read("SELECT buku.*, kategori.* FROM buku INNER JOIN kategori ON buku.kategori_id=kategori.id_kategori WHERE kategori.id_kategori = $id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $kategori[0]['nama_kategori'] ?></title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <!-- NAVBAR -->
    <?php require_once "layout/navbar.php" ?>
    <!-- end of NAVBAR -->

    <!-- EBOOK SESUAI KATEGORI -->
    <div class="container-fluid my-3">
        <div class="container d-flex justify-content-center">
            <h3 class=" d-inline py-2 px-3 text-white rounded-2 mx-2 my-3 titillium-web-bold bg-success">
                <?php if (!isset($ebooks[0])) {
                    echo "Belum Ada Ebook Di kategori ini";
                }else{
                    echo $ebooks[0]['nama_kategori'] ;
                } ?>
            </h3>
        </div>
        <div class=" container my-2">
            <div class="row">
                <?php foreach ($ebooks as $book) { ?>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2 d-flex justify-content-center my-2 my-md-3 my-xl-4">
                    <div class="px-2 " style="height:340px;max-width:180px;min-width:180px;">
                        <div class="card border-1 border-black shadow-hover pb-2 h-100">
                            <div class=" card-img-top h-75 overflow-hidden ">
                                <img src="img/<?= $book["cover"]?>" class="card-img-top h-100 " alt="...">
                            </div>
                            <div class="card-body text-center  "
                                style="font-size:0.8rem;overflow: hidden;white-space:nowrap; text-overflow: ellipsis;">
                                <b class=" titillium-web-bold"><?php echo $book["judul"] ?></b>
                                <br>
                                <span class="text-grey titillium-web-regular">Ditulis oleh
                                    <?php echo $book["penulis"] ?></span>
                            </div>

                            <!-- lihat detail ebook-->
                            <div class="aksi px-3  text-center mb-2">
                                <a style="border:1px solid black;box-shadow:2px 2px 0 black;"
                                    class="btn btn-outline-success w-100"
                                    href="detail_ebook.php?id=<?= $book['id']?>">Pilih</a>
                            </div>
                            <!-- end of lihat detail ebook -->
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- EBOOK SESUAI KATEGORI -->


    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>