<?php
include 'koneksi.php';
session_start();

if(isset($_POST['komentar'])) {
    // Ambil data yang dikirim melalui formulir
    $komentar = $_POST['komentar'];
    $fotoID = $_POST['FotoID']; // Ambil FotoID dari parameter URL

    // Escape input untuk mencegah SQL Injection
    $komentar = mysqli_real_escape_string($koneksi, $komentar);

    // Ambil userID dari session
    $userID = $_SESSION['userid'];

    // Query untuk menyimpan komentar ke dalam database
    $query = "INSERT INTO komentarfoto (FotoID, UserID, IsiKomentar) VALUES ('$fotoID', '$userID', '$komentar')";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        // Komentar berhasil disimpan, redirect ke halaman yang sama untuk menghindari pengiriman ulang formulir
        header("Location:../gambar.php?FotoID=$fotoID");
        exit();
    } else {
        // Jika terjadi kesalahan dalam query
        echo "Error: " . mysqli_error($koneksi);
    }
}
 

// Menghapus Komentar
if (isset($_GET['KomentarID'])) {
    $komentarID = $_GET['KomentarID'];
    $FotoID = $_GET['Fotoid'];
    
    // Memeriksa apakah komentar yang akan dihapus dimiliki oleh pengguna yang masuk
    $checkQuery = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE KomentarID='$komentarID' AND UserID='{$_SESSION['userid']}'");
    if(mysqli_num_rows($checkQuery) > 0) {
        // Hapus komentar jika dimiliki oleh pengguna yang masuk
        $sql = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE KomentarID='$komentarID'");
        echo "<script>
                alert('Komentar berhasil dihapus!');
                location.href='../gambar.php?FotoID=".$FotoID."';
              </script>";
    } else {
        // Jika komentar tidak dimiliki oleh pengguna yang masuk
        echo "<script>
                alert('Anda tidak memiliki izin untuk menghapus komentar ini.');
                location.href='../gambar.php?FotoID=".$FotoID."';
              </script>";
    }
}
?>
