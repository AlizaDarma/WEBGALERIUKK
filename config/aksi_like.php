<?php
session_start();
include 'koneksi.php';
if(isset($_POST['suka'])){
    //validasi login
    if($_SESSION['status'] = 'login'){
        //ambil data input dari form
        $gam=$_POST['gam'];
        $id=$_SESSION['userid'];
        $like=$_POST['like'];
        $tgl=date('d-m-y');
        //cek row data
        $cekk=mysqli_query($koneksi,"SELECT * FROM likefoto WHERE UserID='".$id."' AND FotoID='".$gam."'");
        //jika data sudah ada maka akan dihapus
        if(mysqli_num_rows($cekk) > 0){
            echo $hapus=mysqli_query($koneksi,"DELETE FROM likefoto WHERE UserID='".$id."' AND FotoID='".$gam."'");
            //kembali ke halaman awal
            if($hapus){
                echo '<script>history.go(-1)</script>';
            }else{
                echo 'gagal'.mysqli_error($koneksi);
            }
            }else{
                //jika data belum ada maka data baru akan diinput
                $insert=mysqli_query($koneksi,"INSERT INTO likefoto VALUES(null,'".$gam."','".$id."','1','".$tgl."')");
                //kembali ke halaman awal
                if($insert){
                    echo '<script>history.go(-1)</script>';
                    $com;
                }else{
                    echo 'gagal'.mysqli_error($koneksi);
                }
            }
            //jika belum login maka tidak bisa like foto
            }else{
                echo '<script>alert("Login terlebih dahulu!")</script>';
                echo '<script>window.location="../login.php"</script>';
            }
        } 
?>