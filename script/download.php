<?php
// Nama file yang akan diunduh
$namafile = $_GET['nama'];

$path = "../file/$namafile";
// Header untuk memulai unduhan
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($path) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
?>