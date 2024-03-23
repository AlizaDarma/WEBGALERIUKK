<?php
include 'config/koneksi.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssku.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/album.css">
    <link rel="stylesheet" href="css/unggah.css">
    <title>EDIT PROFILE</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- Navbar -->
                <nav class="nav">
                    <div class="container-fluid">
                        <a href="index.php" class="Text-decoration-none"><span class="nav-brand mb-0 h1">Glitz</span></a>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 ">
                <div class="card ms-5">
                    <div class="card-header">
                        <p class="text-album">Edit Profile</p>
                    </div>
                    <div class="card-body">
                        <form action="config/aksi_editprofile.php" method="POST">
                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" name="username" class="form-control">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat"></textarea>
                            
                            <button type="submit" class="btn btn-primary unggah-button" name="tambah">Edit Profile</button>
                        </form>
                    </div>
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