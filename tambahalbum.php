<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssku.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/editprofile.css">
    <link rel="stylesheet" href="css/tambahalbum.css">

    <title>TAMBAH ALBUM</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- Navbar -->
                <nav class="nav">
                    <div class="container-fluid">
                        <a href="index.php"><span class="nav-brand mb-0 h1">Glitz</span></a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-7 ms-5">
                <form class="d-flex-justify-content-start">
                    <input class="search" type="search" aria-label="Search">
                    <button class="button" type="submit"><i class="bi bi-search" style="color:#8f8989"></i></button>
                </form>
            </div>
            <div class="col-lg-2 ms-auto">
                <div class="col-lg-2 d-flex align-items-baseline">
                    <a class="button2 btn" href="login.php">Masuk</a>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https:/source.unsplash.com/1920x1080/?green mountain" alt="profil"
                                class="profile">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu"
                            aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="profileuser.php">Profil Anda</a></li>
                            <li><a class="dropdown-item" href="album.php">Album Anda</a></li>
                            <li><a class="dropdown-item" href="unggah.php">Unggah</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="judul mb-5">Tambah Album</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="form-group">
                        <label for="nama" class="album-text mb-3">Nama Album</label>
                        <input type="text" id="nama" name="masuk" class="textfield"><br>
                        <label for="exampleFormControlTextarea1" class="album-text mb-3">Deskripsi Album</label><br>
                        <textarea class="textarea" id="exampleFormControlTextarea1"
                            style="margin-left:3.5rem;"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="masuk" class="btn btn-primary tambah-button" value="Tambah Album">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card" style="width: 18rem; margin-left: 70px;">
                <img src="https:/source.unsplash.com/1920x1080/?people" class="card-img-top mt-3 px-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pilih Foto Album Anda</h5>
                    <a href="#" class="btn btn-primary pilih-button">Pilih</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <p>&copy; Copyright Glitz 2024 </p>
        </div>
    </footer>

</body>

</html>