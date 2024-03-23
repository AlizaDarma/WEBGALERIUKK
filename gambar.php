<?php
include 'config/koneksi.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssku.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/gambar.css">
    <link rel="stylesheet" href="css/komentar.css">
    <title>GAMBAR</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- As a heading -->
                <nav class="nav">
                    <div class="container-fluid">
                        <a href="index.php" class="text-decoration-none"><span
                                class="nav-brand mb-0 h1">Glitz</span></a>
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

                    <div class="dropdown me-2">
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

    <div class="image">
        <div class="container">
            <?php 
             //memeriksa apakah parameter FotoID ada dalam URL
                if(isset($_GET['FotoID'])) {
                $FotoID = $_GET['FotoID'];
                }

                //Query
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'");
                while($data = mysqli_fetch_array($sql)){
                //memeriksa apakah data ditemukan
                ?>
            <div class="row">
                <div class="col-md-6 p-5">
                    <img src="assets/img/<?php echo $data['LokasiFile']?>" class="img" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body ms-4">

                        <div class="d-flex">
                            <div class="d-flex p-1">

                                <a href="profile.php" class="text-decoration-none"><small class="text-profile">Aliza
                                        Darma</small></a>
                            </div>
                            <div class="d-flex mt-1">
                                <div class="me-3">
                                    <form method="post" action="config\aksi_like.php">
                                    <input type="hidden" name="gam" value="<?php echo $FotoID ?>">
                                    <input type="hidden" name="nm" value="<?php echo $_SESSION['userid'] ?>" required>
                                    <input type="hidden" name="like">
                                    <?php
                                        $qt = mysqli_query($koneksi, "SELECT SUM(suka) AS jm FROM likefoto WHERE FotoID = '".$_GET['FotoID']."'");
                                        if(mysqli_num_rows($qt) > 0){
                                            while($q=mysqli_fetch_array($qt)){
                                    ?>
                                    <button class="btn" name="suka"><i class="bi bi-heart icon"></i><small> <?php echo $q['jm'] ?></small></button>
                                    <?php }}else{ ?>
                                        <p>Tidak ada like</p>
                                    <?php } ?>
                                    </form>
                                   
                                </div>

                            </div>
                        </div>

                        <h3 class="card-title"><?php echo $data['JudulFoto']?></h3>
                        <p class="card-text"><?php echo $data['DeskripsiFoto']?></p>
                        <p class="card-text"><small
                                class="text-body-secondary"><?php echo $data['TanggalUnggah']?></small>
                        </p>

                        <!--Textfield komentar  -->
                        <div class="field-komentar">
                            <form action="config/aksi_komentar.php" method="POST">
                                <input type="hidden" name="FotoID" value="<?= $_GET['FotoID']?>">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Tambahkan komentar"
                                        name="komentar" required>
                                    <button class="btn btn-primary" type="submit">Kirim</button>
                                </div>
                            </form>
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

    <!-- query menampilkan komentar -->
    <div class="komentar">
        <div class="container">
            <h3 class="text-komentar">Komentar</h3>
            <?php 
                if(isset($_GET['FotoID'])) {
                $FotoID = $_GET['FotoID'];
                }
                $sql = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=
                user.userid WHERE komentarfoto.FotoID='$FotoID'");
                while($data = mysqli_fetch_array($sql)){?>
            <p class="komentar-user"><?=$data['Username']?></p>
            <p class="isi-komentar"><?=$data['IsiKomentar']?><br><?=$data['TanggalKomentar']?></p>
            <!-- Tambahkan link untuk menghapus komentar -->
            <a href="config/aksi_komentar.php?KomentarID=<?=$data['KomentarID']?>&Fotoid=<?=$FotoID?>" class="isi-komentar text-decoration-none">Hapus</a>
           <?php }?>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $('#comments').on('show.bs.collapse', function() {
            $('.toggle-icon').removeClass('bi-caret-down-fill').addClass('bi-caret-up-fill');
        })
        $('#comments').on('hide.bs.collapse', function() {
            $('.toggle-icon').removeClass('bi-caret-up-fill').addClass('bi-caret-down-fill');
        })
    });
    </script>
</body>

</html>