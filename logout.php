<?php
//hapus session
session_start();
session_unset();
session_destroy();

//hapus cookie
setcookie('id','',time()-3600);
setcookie('key','',time()-3600);

header("Location: index.php");
?>