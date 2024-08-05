<?php 
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];
    $result = mysqli_query($konek,"INSERT INTO `kategori` VALUES ('','$nama_kategori')");

    if(mysqli_affected_rows($konek) > 0){
        header("Location: index.php");
    }else{
        echo "<script>alert('Gagal Menambahkan Kategori')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <?php require_once "layout/navbar.php" ?>

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div style="box-shadow: 7px 5px 0px black;"
            class="container col-md-10 col-lg-5 my-4 py-3 border border-2 border-black ">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- TEKS INFO -->
                <h2 class="text-center mb-4 titillium-web-bold">
                    Tambah Kategori
                </h2>
                <!-- END OF TEKS INFO -->

                <!-- judul_ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="nama_kategori"><b class="me-2 titillium-web-semibold ">Masukan Nama Kategori</b></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="nama_kategori" id="nama_kategori"
                        required placeholder="Contoh : Dongeng">
                </div>
                <!-- judul_ebook -->

                <!-- btn  -->
                <div class="container-fluid d-flex justify-content-center align-items-start mt-3">
                    <button type="submit" name="submit" class="btn btn-success w-100">Submit</button>
                </div>
                <!-- btn -->
            </form>
            <div class=" container mt-3">
                <a class="btn btn-outline-primary " href="table_update_kategori.php">Back</a>
            </div>
        </div>
    </div>
    <!-- end of form insert / tambah -->
    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>