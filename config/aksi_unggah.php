<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto =$_POST['judulfoto'];
    $deskripsifoto =$_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumid =$_POST['albumid'];
    $userid =$_SESSION['userid'];
    $foto =$_FILES['lokasifile']['name'];
    $tmp =$_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$judulfoto', '$deskripsifoto', 
    '$tanggalunggah', '$namafoto', '$albumid','$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../profileuser.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $fotoid     =  $_POST['fotoid'];
    $judulfoto  =$_POST['judulfoto'];
    $deskripsifoto  =$_POST['deskripsifoto'];
    $tanggalunggah  = date('Y-m-d');
    $albumid    =$_POST['albumid'];
    $userid     =$_SESSION['userid'];
    $foto   =$_FILES['lokasifile']['name'];
    $tmp    =$_FILES['lokasifile']['tmp_name'];
    $lokasi     = '../assets/img/';
    $namafoto   = rand().'-'.$foto;

    if ($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$judulfoto', DeskripsiFoto='$deskripsifoto', TanggalUnggah='$tanggalunggah', AlbumID='$albumid' WHERE FotoID='$fotoid'");
    }else{
        $query = mysqli_query($koneksi, "SELECT * FROM foto");
        $data = mysqli_fetch_array($query);
        if (is_file('../assets/img/'.$data['LokasiFile'])) {
            unlink('../assets/img/'.$data['LokasiFile']);
        }
        move_uploaded_file($tmp, $lokasi.$namafoto);
        $sql == mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$judulfoto',
        DeskripsiFoto='$deskripsifoto', TanggalUnggah='$tanggalunggah', LokasiFile='$namafoto', AlbumID='$albumid' WHERE FotoID='$fotoid'");
    }
    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../profileuser.php';
    </script>";
}

if(isset($_POST['hapus'])){
    $fotoid = $_POST['fotoid'];
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$fotoid'");
        $data = mysqli_fetch_array($query);
        if (is_file('../assets/img/'.$data['LokasiFile'])) {
            unlink('../assets/img/'.$data['LokasiFile']);
        }

        $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");

    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../profileuser.php';
    </script>";
}
    