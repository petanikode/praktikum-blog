<?php
session_start();

if(isset($_SESSION['username'])){

    include('../../konektor.php');

?>
<!-- Tampilkan halaman damin -->

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
              <?php $artikel = "class='active'"; ?>
              <?php include('aside.php'); ?>
          </aside>

          <section id="konten">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

              <form class="form" action="" method="POST">
                  <div class="form-group">
                      <input type="text" name="judul" class="form-control" placeholder="Judul artikel">
                  </div>
                  <div class="form-group">
                      <textarea name="isi" class="form-control" rows="16" placeholder="Tuliskan apa yang anda pikirkan"></textarea>
                  </div>
                  <div class="form-group">

                      <input type="hidden" name="penulis" value="<?php echo $_SESSION['username'] ?>"/>

                      <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-send"></i> Terbitkan</button>
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

// kode untuk menyimpan artikel ke database
if(isset($_POST['simpan'])){
    $judul = empty($_POST['judul']) ? "Tampa judul": $_POST['judul'];
    $isi = $_POST['isi'];
    $penulis = $_POST['penulis'];

    // lakukan penyimpanan ke database
    $simpan = mysqli_query($koneksi, "INSERT INTO artikel (judul,isi,penulis) VALUES('$judul','$isi','$penulis')");

    if($simpan) {
        // berhasil tersimpan, arahkan ke tabel data artikel
        header("location: index.php");
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
