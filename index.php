<?php
include 'config/koneksi.php';
session_start();
//query untuk select data dari tabel
$sel="SELECT * FROM foto";
$cek=mysqli_query($koneksi,$sel);
//perintah untuk mengambil data tabel foto
$data=mysqli_fetch_assoc($cek);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssku.css">

    <title>HOMEPAGE</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- As a heading -->
                <nav class="nav">
                    <div class="container-fluid">
                        <span class="nav-brand mb-0 h1">Glitz</span>
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
                    <?php
                       if (empty($_SESSION['status'])) { ?>
                    <a class="button2 btn" href="login.php">Masuk</a>
                    <a class="button2 btn" href="register.php">Daftar</a>
                    <?php } else { ?>
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu"
                            aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="profileuser.php">Profile Anda</a></li>
                            <li><a class="dropdown-item" href="album.php">Album Anda</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="config/aksi_logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>

            </div>

        </div>


        </nav>
    </div>
    </div>
    <div class="container-fluid ">
        <div class="container mt-5">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="https:/source.unsplash.com/1920x1080/?nature" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Hutan Indonesia</h5>
                            <p>Keindahan dan Keasrian Alam Indonesia .</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https:/source.unsplash.com/1920x1080/?green mountain" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Gunung</h5>
                            <p>Keindahan bukit dan gunung.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https:/source.unsplash.com/1920x1080/?beach" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Pantai</h5>
                            <p>Kesejukan pantai Indonesia yang memukau.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <h4 class="text5"> Inspirasi </h4>
            <div class="row">
                <?php
                $sql = mysqli_query($koneksi, "SELECT foto.FotoID, foto.JudulFoto, foto.LokasiFile, 
                user.UserID, user.Username FROM foto INNER JOIN user ON 
                foto.UserID = user.UserID ORDER BY RAND()");
                while($result = mysqli_fetch_assoc($sql)) {
                 ?>
                <div class="col-3">
                    <div class="">
                        <a href="gambar.php?FotoID=<?= $result['FotoID']?>"><img src="assets/img/<?= $result['LokasiFile']?>" class="gambar"
                                alt="..." data-bs-toggle="modal" data-bs-target="#mo">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex p-1">
                            
                            <a href="profile.php?UserID=<?= $result['UserID']?>" class="text-decoration-none"><small class="text-profile"><?php echo $result['Username']?></small></a>
                        </div>
                        <div class="d-flex mt-1">
                            <div class="me-2">
                                <?php
                                $userid=$result['UserID'];
                                $fotoid = $result['FotoID'];
                                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID = '$userid'");
                                if(mysqli_num_rows($ceksuka) == 1) { ?> 
                                <i class="bi bi-heart me-1"></i>
                                    <?php  }else{ ?>    
                                        <i class="bi bi-heart me-1"></i>
                                        </a><small>
                                        <?php }
                                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                                        echo mysqli_num_rows($like);
                                        ?>
                                        </small>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php 
                    }
                    ?>
            </div>
        </div>

    </div>
    <div class="container-fluid gb">
        <div class="row">
            <div class="col">
                <h2 class="gb1">Ayo Gabung Jadi Kontributor</h2>
                <p class="gb2">Jelajahi Dunia Bersama</p>
                <button class="gb3 btn-primary" type="submit">
                    <p class="text">Gabung Sekarang </p>
                </button>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!----------------------FOOTER--------------------->
    <footer>
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-4">
                    <div class="">
                        <h1 class="text">Glitz</h1>
                    </div>
                </div>
                <div class="col-4">
                    <p class="text1">Ekspresikan kreatifitasmu<br>dengan mudah dan tanpa batas</br></P>
                </div>
                <div class="col-4">
                    <h4 class="text2">Kontak kami :</h4>
                    <p class="text3">No.Hp : 0852-7771-2368<br>Instagram : @aliza_darma</br></P>
                </div>
            </div>
        </div>
    </footer>
    <?php if($_SESSION['log']){ ?>
        <script>
            swal("Login Berhasil!", "Selamat Datang <?php echo $_SESSION['a_global']->Username ?>", "success");
        </script>
    <?php unset($_SESSION['log']);} ?>
</body>