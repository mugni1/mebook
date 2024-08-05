<?php 
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

//ambil data dari db kategori
$id = $_GET['id'];
$result = mysqli_query($konek,"SELECT * FROM kategori WHERE id_kategori = $id");
$kategori = mysqli_fetch_assoc($result);

//update data jurusan
if (isset($_POST['submit'])) {
    $iid = $_POST['iid'];
    $nama_kategori = $_POST['nama_kategori'];

    $update = mysqli_query($konek,"UPDATE `kategori` SET `nama_kategori`='$nama_kategori' WHERE id_kategori = $iid");
    if (mysqli_affected_rows($konek) > 0) {
        header("Location: table_update_kategori.php");
    }else{
        echo  "<script>alert('Gagal Mengupdate kategori')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kategori</title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div style="box-shadow: 7px 5px 0px black;"
            class="container col-md-10 col-lg-5 my-4 py-3 border border-2 border-black ">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- id hidden -->
                <input type="hidden" name="iid" value="<?= $kategori['id_kategori'] ?>">
                <!-- end id hidden -->

                <!-- TEKS INFO -->
                <h2 class="text-center mb-4 titillium-web-bold">
                    Update Kategori
                </h2>
                <!-- END OF TEKS INFO -->

                <!-- judul_ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="nama_kategori"><b class="me-2 titillium-web-semibold ">Masukan Nama Kategori</b></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="nama_kategori" id="nama_kategori"
                        required placeholder="Contoh : Dongeng" value="<?= $kategori['nama_kategori'] ?>">
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
</body>

</html>