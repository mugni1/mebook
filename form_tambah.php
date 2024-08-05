<?php 
session_start();
require_once "script/function.php";
$kategoris = read("SELECT * FROM `kategori`");

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
$result = insert($_POST);
 //cek apakah data berhasil di insert atau tidak
if ($result > 0){
    echo "<script>
    alert('Data berhasil di tambahkan');
    document.location.href= 'index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal di tambahkan');
    </script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ebook</title>
    <?php require_once "layout/style.php" ?>
</head>

<body>
    <!-- navbar -->
    <?php require_once "layout/navbar.php" ?>
    <!-- end of navbar -->

    <!-- form insert / tambah -->
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <div style="box-shadow: 7px 5px 0px black;"
            class="container col-12 col-md-10 col-lg-5 my-4 py-3 border border-2 border-black ">
            <form class=" container" action="" method="post" enctype="multipart/form-data">
                <!-- TEKS INFO -->
                <h2 class="text-center mb-4 titillium-web-bold">
                    Tambah
                </h2>
                <!-- END OF TEKS INFO -->
                <!-- kategori -->
                <div class="container-fluid d-flex justify-content-center align-items-center my-2">
                    <label for="kategoti" class=""><b class="me-2  titillium-web-semibold">Pilih Kategori</b> </label>
                    <select class=" rounded-1  titillium-web-semibold text-success" name="kategori" id="kategori">
                        <?php foreach ($kategoris as $kategori) { ?>
                        <option value=<?= $kategori['id_kategori'] ?> class=" titillium-web-semibold">
                            <?= $kategori['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- end of kategori -->

                <!-- judul_ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="judul"><b class="me-2 titillium-web-semibold ">Masukan Judul</b></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="judul" id="judul" required
                        placeholder="Contoh : My Diary">
                </div>
                <!-- judul_ebook -->

                <!-- penulis_ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="penulis"><b class="me-2 titillium-web-semibold">Masukan Penulis</b></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="penulis" id="penulis" required
                        placeholder="Contoh : Stevan Joel">
                </div>
                <!-- penulis_ebook -->

                <!-- penerbit_ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="penerbit"><b class="me-2 titillium-web-semibold">Masukan Penerbit</b></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="penerbit" id="penerbit" required
                        placeholder="Contoh : PT.MEBOOK.Tbk">
                </div>
                <!-- penerbit_ebook -->

                <!-- deskripsi -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="deskripsi"><b class="me-2 titillium-web-semibold">Masukan Deskripsi</b></label>
                    <textarea class="w-100  titillium-web-light px-2" name="deskripsi" id="deskripsi" cols="30" rows="6"
                        required
                        placeholder="Contoh : Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, nisi! Voluptate molestiae "></textarea>
                </div>
                <!-- deskripsi -->

                <!-- link pembelian buku -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="link_buku"><b class="me-2 titillium-web-semibold text-success">Link Pembelian
                            Buku</b><i class="titillium-web-light">( Opsional )</i></label>
                    <input class="w-100  titillium-web-light px-2" type="text" name="link_buku" id="link_buku">
                </div>
                <!-- link pembelian buku -->

                <!-- file ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="file_ebook"><b class="me-2 titillium-web-semibold text-success">Masukan file
                            ebook</label>
                    <input class="titillium-web-light border" type="file" name="file_ebook" id="file_ebook">
                </div>
                <!-- file ebook -->

                <!-- cover ebook -->
                <div class="container-fluid d-flex flex-column justify-content-center align-items-start my-2">
                    <label for="cover"><b class="me-2 titillium-web-semibold text-success">Masukan cover
                            ebook</label>
                    <input class="titillium-web-light border" type="file" name="cover" id="cover">
                </div>
                <!-- cover ebook -->

                <!-- btn  -->
                <div class="container-fluid d-flex justify-content-center align-items-start mt-3">
                    <button type="submit" name="submit" class="btn btn-success w-100">Submit</button>
                </div>
                <!-- btn -->
            </form>
        </div>
    </div>
    <!-- end of form insert / tambah -->


    <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>