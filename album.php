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
    <title>ALBUM</title>
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
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <p class="text-album">Tambah Album</p>
                    </div>
                    <div class="card-body">
                        <form action="config/aksi_album.php" method="POST">
                            <label class="form-label">Nama Album</label>
                            <input type="text" name="namaalbum" class="form-control required">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required></textarea>
                            <button type="submit" class="btn btn-primary tambah-button" name="tambah">Tambah
                                Data</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="text-album">Data Album</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$userid'");
                                while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['NamaAlbum'] ?></td>
                                    <td><?php echo $data['Deskripsi'] ?></td>
                                    <td><?php echo $data['TanggalDibuat'] ?></td>
                                    <td>
                                        <!-- EDIT -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit<?php echo $data['AlbumID'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit<?php echo $data['AlbumID'] ?>" tabindex="-1"
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
                                                        <form action="config/aksi_album.php" method="POST">
                                                            <input type="hidden" name="albumid" value="<?php echo 
                                                                $data['AlbumID'] ?>">
                                                            <label class="form-label">Nama Album</label>
                                                            <input type="text" name="namaalbum" value="<?php echo 
                                                                $data['NamaAlbum']?>" class="form-control required">
                                                            <label class="form-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi" required>
                                                                <?php echo $data['Deskripsi']; ?>
                                                            </textarea>

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

                                        <!-- HAPUS -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#hapus<?php echo $data['AlbumID'] ?>">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="hapus<?php echo $data['AlbumID'] ?>" tabindex="-1"
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
                                                        <form action="config/aksi_album.php" method="POST">
                                                            <input type="hidden" name="albumid" value="<?php echo 
                                                                $data['AlbumID'] ?>">
                                                            Apakah kamu yakin mau menghapus data<strong> <?php echo $data['NamaAlbum']?></strong>?

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
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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