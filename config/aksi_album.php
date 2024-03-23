<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaalbum =$_POST['namaalbum'];
    $deskripsi =$_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('', '$namaalbum', '$deskripsi', '$tanggal', '$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../album.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum =$_POST['namaalbum'];
    $deskripsi =$_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE album SET NamaAlbum= '$namaalbum', Deskripsi='$deskripsi',
        TanggalDibuat='$tanggal' WHERE AlbumID='$albumid'");

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../album.php';
    </script>";
}

if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE AlbumID='$albumid'");

    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../album.php';
    </script>";
}

?>