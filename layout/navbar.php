<nav style="box-shadow: 0 2px 2px black;" class="navbar navbar-dark navbar-expand-lg sticky-top bghijau">
    <div class="container-fluid">
        <a class="navbar-brand titillium-web-bold" href="#">
            <img src="logo.jpeg" height="40px" alt="logo" class="rounded-3" />
            MEBOOK
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active titillium-web-semibold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle titillium-web-semibold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul style="border:2px solid black;box-shadow:2px 2px 0 black;" class="dropdown-menu rounded-1">
                        <?php foreach ($kategoris as $kategori) { ?>
                        <li>
                            <a class="dropdown-item titillium-web-regular"
                                href="kategori_ebook.php?id=<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>

            <!-- search -->
            <form class="d-flex" role="search" action="hasil_search.php" method="post">
                <input style="border:2px solid black;box-shadow:2px 2px 0 black;"
                    class="form-control me-2 titillium-web-semibold" type="search" placeholder="Search..."
                    aria-label="Search" name="keyword" />
                <button style="border:2px solid black;box-shadow:2px 2px 0 black;" class="btn btn-light  accordion "
                    type="submit" name="submit"><i class="bi bi-search"></i></button>
            </form>
            <!--end of search -->
            <div style="border:2px solid black;box-shadow:2px 2px 0 black;"
                class="d-flex px-2 py-1 mx-lg-3 my-2 my-lg-0  bg-white  rounded-2 bg-dark">
                <div class="nav-item dropdown dropdown-center">
                    <a class="nav-link dropdown-toggle text-black titillium-web-semibold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php 
                       if (isset($_SESSION['login'])) {
                            echo "admin";
                       }else{
                            echo "user";
                       }
                       ?>
                    </a>
                    <ul style="border:2px solid black;box-shadow:2px 2px 0 black;"
                        class="dropdown-menu dropdown-menu-light dropdown-menu-lg-end mt-3">
                        <?php if (isset($_SESSION['login'])) {
                            
                        ?>
                        <li>
                            <a class="dropdown-item text-center titillium-web-semibold" href="form_tambah.php"><i
                                    class="bi bi-folder-plus"></i>
                                Tambah Ebook</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-center titillium-web-semibold"
                                href="table_update_kategori.php"><i class="bi bi-pencil-square"></i>
                                Edit Kategori</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-center titillium-web-semibold" href="logout.php"><i
                                    class="bi bi-box-arrow-left"></i>
                                Logout</a>
                        </li>
                        <?php }else{ ?>
                        <li>
                            <a class="dropdown-item text-center" href="login.php"><i class="bi bi-box-arrow-left"></i>
                                Login admin</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>