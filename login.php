<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/cssku.css">
    <title>Masuk</title>
</head>

<body>
    <!--
    Cointainer
    container berisi 6 kolom
    container - fluid berisi 12 kolom -> full
-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <img src="gambar/a1.png" alt="" class="a1">

            </div>
            <div class="col-lg-6">
                <h1 class="judul mb-5">Masuk Ke Glitz</h1>
                <form action="config/aksi_login.php" method="POST">
                    <div class="row">
                    <label for="nama" class="text mb-3">Nama Pengguna</label>
                        <input type="text" id="nama" name="nama" class="userku mb-5 - phone">
               

                    <label for="pass" class="text mb-3">Password</label>
                    <input type="password" id="password" name="password" class="userku mb-5 - phone">


                    <input type="submit" name="masuk" class="masuk btn btn-outline-primary - phone" value="Masuk">

                    <p class="text-center text2 mt-3">Belum punya akun? <a href="register.php">Daftar</a> 
                    </div>     
                </form>
                
            </div>

        </div>
    </div>
    </div>

</body>

</html>