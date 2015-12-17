<?php
session_start();

if(isset($_SESSION['username'])){

    include('../../konektor.php');

?>
<!-- Tampilkan form tambah menu -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../img/ArdiantaPargo.png">

    <title>Administrator Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../bootstrap/css/style-admin.css" rel="stylesheet">

    <!-- font-awesome untuk ikon -->
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet">

  </head>

  <body>

    <nav><?php include('../navbar.php'); ?></nav>

    <div class="container-fluid">
      <div class="row">
          <aside>
              <?php $menu = "class='active'"; ?>
              <?php include('aside.php'); ?>
          </aside>

          <section id="konten">
            <div class="col-sm-12 col-sm-offset-3 col-md-10 col-md-offset-2 main">

              <form class="form" action="" method="POST">
                  <div class="form-group">
                      <label for="username">Username</nama>
                      <input type="text" name="username" class="form-control" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</nama>
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                      <label for="nama-lengkap">Nama Lengkap</nama>
                      <input type="text" name="nama-lengkap" class="form-control" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                      <label for="email">Email</nama>
                      <input type="text" name="email" class="form-control" placeholder="Email"/>
                  </div>

                  <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                  </div>

              </form>

            </div>
          </section>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../bootstrap/js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/js/holder.js"></script>
  </body>
</html>

<?php

// kode untuk menyimpan menu ke database
if(isset($_POST['simpan'])){

    $nama = $_POST['username'];
    $url = md5($_POST['password']);
    $urutan = $_POST['password'];
    $status = $_POST['email'];

    // lakukan penyimpanan ke database
    $simpan = mysqli_query($koneksi, "INSERT INTO user (username,password,nama_lengkap,email) VALUES('$nama','$url','$urutan','$status')");

    if($simpan) {
        // berhasil tersimpan, arahkan ke tabel data artikel
        echo "<script>window.location = 'index.php'</script>";
    } else {
        // gagal menyimpan
        echo "Gagal menyimpan, suatu kesalahan terjadi!";
    }
}

} else {
    // suruh user login
    header('location: ../login.php');
}

?>
