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
    <title>PROFILE USER</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <!-- Navbar -->
                <nav class="nav">
                    <div class="container-fluid">
                        <a href="index.php" class="text-decoration-none"><span class="nav-brand mb-0 h1">Glitz</span></a>
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
                            <li><a class="dropdown-item" href="config/aksi_logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-2">
                <div class="profil">
                    <?php                
                    $userid = $_SESSION['userid'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$userid'");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                    <h2 class="profile-nama text-center"><?php echo $data['Username'] ?></h2>
                    <p class="profile-info text-center"><?php echo $data['NamaLengkap'] ?></p>
                    <p class="profile-info text-center"><?php echo $data['Alamat'] ?></p> <br>
                </div>
                <?php
                    }
                    ?>
                <div class="d-flex mt-3 ">
                    <a class="btn btn-primary mx-1" href="editprofile.php"role="button" style="font-size:13px;">Edit Profile</a>
                    <a class="btn btn-primary " href="unggah.php" role="button" style="font-size:13px;">Unggah Foto</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="">
                        <h3 class="profile-text mt-5">Postingan anda</h3>
                    </div>
                </div>
            </div>
            <div class="row gy-2">
                <?php 
                $no = 1;
                $userid = $_SESSION['userid'];
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$userid'");
                while($data = mysqli_fetch_array($sql)){
                ?>
                <div class="col-lg-4">
                    <div class="">
                        <a href="gambar.php?FotoID=<?php echo $data['FotoID'];?>">
                            <img src="assets/img/<?php echo $data['LokasiFile'] ?>" class="profile-post" alt=""></a>
                    </div>

                    <button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal"
                        data-bs-target="#edit<?php echo $data['FotoID'] ?>">
                        Edit
                    </button>

                    <button type="button" class="btn btn-primary edit-button" data-bs-toggle="modal"
                        data-bs-target="#hapus<?php echo $data['FotoID'] ?>">
                        Hapus
                    </button>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="edit<?php echo $data['FotoID'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-tittle" id="exampleModalLabel">Edit Data
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/aksi_unggah.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="fotoid" value="<?php echo 
                                                                $data['FotoID'] ?>">
                                        <label class="form-label">Judul Foto</label>
                                        <input type="text" name="judulfoto" value="<?php echo 
                                                                $data['JudulFoto']?>" class="form-control required">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsifoto" required><?php echo $data['DeskripsiFoto']; ?>
                                        </textarea>
                                        <label class="form-label">Album</label>
                                        <select class="form-control" name="albumid">
                                            <?php 
                                            $sql_album =mysqli_query($koneksi, "SELECT * FROM album WHERE
                                            userid='$userid'");
                                            while($data_album = mysqli_fetch_assoc($sql_album)){
                                                ?>
                                            <option <?php if($data_album['AlbumID'] == $data['AlbumID']) {?>
                                                selected="selected"
                                                <?php } ?>value="<?php echo $data_album['AlbumID'] ?>"><?php echo $data_album['NamaAlbum'
                                            ] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="form-label">Foto</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="assets/img/<?php echo $data['LokasiFile'] ?>"
                                                    class="profile-post">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="form-label">Ganti File</label>
                                                <input type="file" class="form-control" name="lokasifile">
                                            </div>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="edit" class="btn btn-primary">Edit
                                        data
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus-->
                    <div class="modal fade" id="hapus<?php echo $data['FotoID'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-tittle" id="exampleModalLabel">Hapus Data
                                    </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="config/aksi_unggah.php" method="POST">
                                        <input type="hidden" name="fotoid" value="<?php echo 
                                                                $data['FotoID'] ?>">
                                        Apakah kamu yakin mau menghapus data<strong>
                                            <?php echo $data['JudulFoto']?></strong>?

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus
                                        data
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
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