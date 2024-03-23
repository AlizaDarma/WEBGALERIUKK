<?php
include 'koneksi.php'; 

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, 
    '$username', '$password', '$email', '$namalengkap', '$alamat')");

if ($sql) {
    echo "<script>
    alert('Pendaftaran akun berhasil');
    location.href='../login.php';
    </script>";
} else {
    echo "Error: " . mysqli_error($koneksi); 
}
?>