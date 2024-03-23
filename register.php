<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/cssku.css">
    <title>Daftar</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <img src="gambar/a2.png" alt="" class="a2">

            </div>
            <div class="col-lg-6">
                <h1 class="judul">Daftar Glitz</h1> <br>

                <form action="config/aksi_register.php" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="nama" class="text mt-4">Nama Lengkap</label><br>
                                </br> <input type="text" id="nama" name="namalengkap" class="user - phone"><br>
                            </div>
                            <div class="col-lg-6">
                                <label for="email" class="text mt-4">Email</label><br>
                                </br> <input type="text" id="email" name="email" class="user - phone">
                            </div>
                            <div class="col-lg-6">
                            <label for="tl" class="text mt-4">Username</label><br>
                                </br> <input type="text" id="username" name="username" class="user - phone px-2">
                            </div>
                            <div class="col-lg-6">
                                <label for="pass" class="text mt-4">Password</label><br>
                                </br> <input type="password" id="pass" name="password" class="user - phone">   
                            </div>
                            <div class="col-lg-6">
                                <label for="alamat" class="text mt-4">Alamat</label><br>
                                </br> <input type="text" id="alamat" name="alamat" class="user1 - phone">   
                            </div>
                            <div class="col-lg-12">
                            <input type="submit" name="masuk" class="daftar mt-5 ms-3 btn btn-outline-primary - phone" value="Daftar">   
                            </div>
                        </div>
                        </form>
                        
            </div>

        </div>
    </div>
    </div>

</body>

</html>
</body>

</html>