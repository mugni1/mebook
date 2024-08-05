<?php 
session_start();
require_once "script/function.php";

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}
$id=$_GET['id'];
$result = delete_kategori($_GET['id']);
 //cek apakah data berhasil di insert atau tidak
if ($result > 0){
    echo "<script>
    alert('Data berhasil di hapus');
    document.location.href= 'index.php';
    </script>";
}else{
    echo "<script>
    alert('Data Gagal di hapus. Sepertinya ada data yang tersambung ke ebook');
    document.location.href= 'index.php';
    </script>";
}

?>