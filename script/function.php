<?php 
$host="localhost";
$username="root";
$password="";
$database="mebook.com";
$konek=mysqli_connect($host,$username,$password,$database);

if (!$konek) {
  echo "gagal konek";
}

//read
function read($query){
    global $konek;
    $result = mysqli_query($konek,$query);
    $rows = [];
    while ($row =  mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
//end of read

//creat / insert
function insert($data){
  global $konek;
  $kategori = strip_tags($data['kategori']);
  $judul = strip_tags($data['judul']);
  $penulis = strip_tags($data['penulis']);
  $penerbit = strip_tags($data['penerbit']);
  $deskripsi = strip_tags($data['deskripsi']);
  $link_buku = strip_tags($data['link_buku']);
  $file_ebook = upload_file();
  $cover_ebook= upload_cover();
  if (!$file_ebook || !$cover_ebook) {
    return false;
  }

 // cek apakah link buku ada isinya
 if ($link_buku == "") {
  $query = "INSERT INTO `buku` (`id`, `kategori_id`, `cover`, `judul`, `penulis`, `penerbit`, `deskripsi`, `link_pembelian`, `file_ebook`) VALUES (NULL, '$kategori', '$cover_ebook', '$judul', '$penulis', '$penerbit', '$deskripsi', NULL, '$file_ebook')";
 }else{
  $query = "INSERT INTO `buku` (`id`, `kategori_id`, `cover`, `judul`, `penulis`, `penerbit`, `deskripsi`, `link_pembelian`, `file_ebook`) VALUES (NULL, '$kategori', '$cover_ebook', '$judul', '$penulis', '$penerbit', '$deskripsi', '$link_buku', '$file_ebook')";
 }
 

  mysqli_query($konek,$query);
  return mysqli_affected_rows($konek);
}

//upload file
function upload_file(){
  $namafile=$_FILES["file_ebook"]["name"];
  $error=$_FILES["file_ebook"]["error"];
  $ukuranfile=$_FILES["file_ebook"]["size"];
  $tmpname=$_FILES["file_ebook"]["tmp_name"];

  //cek apakah ada gambar yg di upload
  if ($error == 4) {
    echo "<script>alert('Pilih file ebook terlebih dahulu')</script>";
    return false;
    }

    //cek apakah yg di upload adalah pdf;
  $ektensifileygvalid=['pdf'];
  $ektensifileygdiinput=pathinfo($namafile, PATHINFO_EXTENSION);
  if (!in_array($ektensifileygdiinput,$ektensifileygvalid)) {
    echo "<script>alert('Harap masukan file yang valid')</script>";
    return false;
  }

   //cek ukuran gambar
    if($ukuranfile > 8000000){
    echo "<script>alert('Ukuran file terlalu besar')</script>";
    return false;    
  }

  //lolos pengecekan
  $namafile_baru = uniqid();
  $namafile_baru = $namafile_baru . "." . $ektensifileygdiinput;
  
  move_uploaded_file($tmpname,"file/$namafile_baru");
  return $namafile_baru;
}
//end of upload file

//upload cover
function upload_cover(){
  $namafile=$_FILES["cover"]["name"];
  $error=$_FILES["cover"]["error"];
  $ukurancover=$_FILES["cover"]["size"];
  $tmpname=$_FILES["cover"]["tmp_name"];

  //cek gambar error
  if ($error == 4) {
    echo "<script>alert('Harap masukan gambar terlebih dahulu')</script>";
    return false;
  }

  //cek ukuran gambar
  if ($ukurancover >= 8000000){
    echo "<script>alert('Gambar yang anda upload terlalu besar')</script>";
    return false;
  }

  //cek ekstensi gambar
  $ekstensi_gambar_yg_valid=['jpg','jpeg','png'];
  $ekstensi_gambar_yg_diinput=pathinfo($namafile,PATHINFO_EXTENSION);
  if (!in_array($ekstensi_gambar_yg_diinput,$ekstensi_gambar_yg_valid)) {
    echo "<script>alert('Harap masukan gambar yang valid')</script>";
    return false;
  }

  //lolos pengecekan
  $nama_cover_baru=uniqid();
  $nama_cover_baru=$nama_cover_baru . "." . $ekstensi_gambar_yg_diinput;
  move_uploaded_file($tmpname,"img/$nama_cover_baru");

  return $nama_cover_baru;
}
//end of upload cover 

//UPDATE 
function update($data) {
  global $konek;
  $id = $data['id'];
  $cover_ebook_lama = $data['cover_lama'];
  $file_ebook_lama = $data['file_ebook_lama'];
  $kategori = strip_tags($data['kategori']);
  $judul = strip_tags($data['judul']);
  $penulis = strip_tags($data['penulis']);
  $penerbit = strip_tags($data['penerbit']);
  $deskripsi = strip_tags($data['deskripsi']);
  $link_buku = strip_tags($data['link_buku']);

  if ($_FILES['file_ebook']['error'] == 4) {
    $file_ebook = $file_ebook_lama;
  }else{
    $file_ebook = upload_file();
  }

  if ($_FILES['cover']['error'] == 4) {
    $cover_ebook = $cover_ebook_lama;
  }else{
      $cover_ebook= upload_cover();
  }
  
  if (!$file_ebook || !$cover_ebook) {
    return false;
  }

  if ($link_buku == "") {
    $query = "UPDATE `buku` SET `kategori_id`='$kategori', `cover` = '$cover_ebook', `judul` = '$judul', `penulis` = '$penulis', `penerbit` = '$penerbit', `deskripsi` = '$deskripsi', `link_pembelian` = NULL, `file_ebook` = '$file_ebook' WHERE `buku`.`id` = $id";
    }else{
    $query = "UPDATE `buku` SET `kategori_id`='$kategori', `cover` = '$cover_ebook', `judul` = '$judul', `penulis` = '$penulis', `penerbit` = '$penerbit', `deskripsi` = '$deskripsi', `link_pembelian` = '$link_buku', `file_ebook` = '$file_ebook' WHERE `buku`.`id` = $id";
    }

  mysqli_query($konek,$query);
  return mysqli_affected_rows($konek);
}
//END OF UPDATE

//DELETE  
function delete($id){
  global $konek;
  $query = "DELETE FROM buku WHERE `buku`.`id` = $id";
  mysqli_query($konek,$query);
  return mysqli_affected_rows($konek);
}
//END OF DELETE

//DELETE KATEGORI
function delete_kategori($id){
  global $konek;
  $query = "DELETE FROM kategori WHERE `kategori`.`id_kategori` = $id";
  mysqli_query($konek,$query);
  return mysqli_affected_rows($konek);
}
//END OF DELETE KATEGORI
?>