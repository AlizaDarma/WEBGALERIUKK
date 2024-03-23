<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) { // Corrected to 'tambah' as per the button's name attribute
    $username = $_POST['username'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $userid = $_SESSION['userid'];

    // Perform database update
    $sql = "UPDATE user SET Username='$username', NamaLengkap='$namalengkap', Alamat='$alamat' WHERE UserID='$userid'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>
        alert('Data berhasil diperbarui!');
        window.location.href='../profileuser.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
