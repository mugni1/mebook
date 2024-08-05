<?php 
session_start();
require_once "script/function.php";

//cek cookiw]e
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username
    $result = mysqli_query($konek,"SELECT username FROM `admin` WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key == hash('sha256',$row['username'])) {
        $_SESSION['login']=true;
    }
}

//cek session
if(isset($_SESSION['login'])){
    header("Location: index.php");
}

//cek input
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //cek ke database
    $result = mysqli_query($konek,"SELECT * FROM `admin` WHERE username = '$username'");

    //cek apakah username ada
    if(mysqli_num_rows($result) == 1){
        //cek password 
        $row = mysqli_fetch_assoc($result);
        if($password == $row['password']){
            //set session
            $_SESSION['login']=true;
            
            //cek remember jika tombol di klik
            if ($_POST['remember']) {
                setcookie('id',$row['id'],time()+60*60*24);
                setcookie('key',hash('sha256',$row['username']),time()+60*60*24);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jersey+25&display=swap" rel="stylesheet" />

</head>

<body>

    <!-- form Login -->
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center ">
        <div style="background-color: #d9d9d9;" class=" container col-md-5 col-lg-3 shadow-sm rounded-3 py-4">

            <form action="" method="post">
                <h2 class=" text-center mb-5 ">LOG IN</h2>
                <div class=" container-fluid d-flex flex-column mb-1  ">
                    <?php if (isset($error)) {?>
                    <div class="alert alert-danger" role="alert">
                        Username atau Password salah
                    </div>
                    <?php } ?>
                    <label for="username" class=" fw-bold">Masukan Username</label>
                    <div class="d-flex w-100">
                        <div
                            class=" w-25 border border-2 border-black d-flex justify-content-center align-items-center bg-white me-1 rounded-1">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <input class=" rounded-1 px-2 py-1 w-100" type="text" name="username" id="username" required>
                    </div>
                </div>
                <div class=" container-fluid d-flex flex-column mb-1     ">
                    <label for="passwoerd" class=" fw-bold">Masukan Password</label>
                    <div class=" d-flex w-100">
                        <div
                            class=" w-25 border border-2 border-black d-flex justify-content-center align-items-center bg-white me-1 rounded-1">
                            <i class="bi bi-key-fill"></i>
                        </div>
                        <input class="  rounded-1 px-2 py-1 w-100 " type="password" name="password" id="password"
                            required>
                    </div>
                </div>
                <div class=" container-fluid d-flex ">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="fw-bold ms-1"> Remember me</label>
                </div>
                <div class=" container-fluid d-flex flex-column my-3  ">
                    <button style="background: #009718;" class=" border-0 rounded-2 text-white py-2 " type="submit"
                        name="submit">SUBMIT</button>
                </div>
                <div class=" container-fluid d-flex flex-column align-items-center">
                    <a style="text-decoration:none;" href="index.php">I'am Is User</a>
                </div>
            </form>

            </divv>
        </div>
        <!-- end of form Login -->

        <script src="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>