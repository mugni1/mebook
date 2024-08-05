<?php 
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

$books = read("SELECT * FROM buku ORDER BY id DESC");

// $books2 = read("SELECT * FROM buku WHERE kategori_id = '2'")
$books2 = read("SELECT * FROM buku ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <?php require_once"layout/navbar.php"; ?>

    <!-- AWAL CAROSOUL -->
    <div class=" container-fluid my-3">
        <div class="row">
            <div class="container my-3 my-md-0 col-12 col-md-6">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner rounded-2">
                            <div class="carousel-item active">
                                <img src="file/caro6.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="file/caro6.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="file/caro6.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container my-2 my-md-0 col-12 col-md-6">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-2">
                        <div class="carousel-item active">
                            <img src="file/caro5.jpeg" class="d-block w-100" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- AKHIR CAROSOUL -->

    <!-- rekomendasi -->
    <div class=" container-fluid my-5">
        <!-- Judul  -->
        <h3 class=" d-inline px-3 text-white rounded-2 mx-2 my-3 titillium-web-bold bg-success">TERBARU</h3>
        <!-- end of judul -->
        <div class="py-4  overflow-x-auto d-flex gap-2">
            <?php  foreach ($books as $book) {  ?>
            <div class="px-2 " style="height:340px;max-width:180px;min-width:180px;">
                <div class="card border-1 border-black shadow-hover pb-2 h-100">
                    <div class=" card-img-top h-75 overflow-hidden ">
                        <img src="img/<?= $book["cover"]?>" class="card-img-top h-100 " alt="...">
                    </div>
                    <div class="card-body text-center  "
                        style="font-size:0.8rem;overflow: hidden;white-space:nowrap; text-overflow: ellipsis;">
                        <b class=" titillium-web-bold"><?php echo $book["judul"] ?></b>
                        <br>
                        <span class="text-grey titillium-web-regular">Ditulis oleh <?php echo $book["penulis"] ?></span>
                    </div>

                    <!-- lihat detail ebook-->
                    <div class="aksi px-3  text-center mb-2">
                        <a style="border:1px solid black;box-shadow:2px 2px 0 black;"
                            class="btn btn-outline-success w-100" href="detail_ebook.php?id=<?= $book['id']?>">Pilih</a>
                    </div>
                    <!-- end of lihat detail ebook -->
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
    <!-- end of rekomendasi -->

    <!-- terpopuler -->
    <div class=" container-fluid my-5">
        <!-- Judul  -->
        <h3 class=" d-inline px-3 text-white rounded-2 mx-2 my-3 titillium-web-bold bg-success">
            POPULER</h3>
        <!-- end of judul -->
        <div class="py-4  overflow-x-auto d-flex gap-2">
            <?php  foreach ($books2 as $book_kategori2) {  ?>
            <div class="px-2 " style="height:340px;max-width:180px;min-width:180px;">
                <div class="card border-1 border-black shadow-hover pb-2 h-100">
                    <div class=" card-img-top h-75 overflow-hidden ">
                        <img src="img/<?= $book_kategori2["cover"]?>" class="card-img-top h-100 " alt="...">
                    </div>
                    <div class="card-body text-center  "
                        style="font-size:0.8rem;overflow: hidden;white-space:nowrap; text-overflow: ellipsis;">
                        <b class=" titillium-web-bold"><?php echo $book_kategori2["judul"] ?></b>
                        <br>
                        <span class="text-grey titillium-web-regular">Ditulis oleh
                            <?php echo $book_kategori2["penulis"] ?></span>
                    </div>

                    <!-- lihat detail ebook-->
                    <div class="aksi px-3  text-center mb-2">
                        <a style="border:1px solid black;box-shadow:2px 2px 0 black;"
                            class="btn btn-outline-success w-100"
                            href="detail_ebook.php?id=<?= $book_kategori2['id']?>">Pilih</a>
                    </div>
                    <!-- end of lihat detail ebook -->
                </div>
            </div>
            <?php }  ?>
        </div>
    </div>
    <!-- end of kategori -->
    <!-- footer -->
    <?php require_once "layout/footer.php" ?>
    <!--end of footer -->

    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>