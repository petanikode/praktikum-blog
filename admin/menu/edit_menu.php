<?php
session_start();

if(isset($_SESSION['username'])){

    include('../../konektor.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        // tampilkan form edit
        include('../../konektor.php');

        // ambil data dari database
        $id = $_GET["id"];
        $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE id=$id");
        if(mysqli_num_rows($query) > 0){
            $mn = mysqli_fetch_assoc($query);
        } else {
            // artikel tidak ada di dabase
            echo "<script>window.location = 'index.php'</script>";
        }

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
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <form class="form" action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Menu</nama>
                        <input type="text" name="nama" class="form-control" placeholder="Nama menu" required value="<?php echo $mn['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</nama>
                        <input type="text" name="url" class="form-control" placeholder="Inputkan URL" required value="<?php echo $mn['url']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="urutan">Urutan</nama>
                        <input type="number" name="urutan" class="form-control" placeholder="Urutan" required value="<?php echo $mn['urutan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Status">Status</nama>
                        <select name="status" class="form-control">
                            <option value="1" <?php echo ($mn['status'] == 1) ? "selected":"" ?>>Aktif</option>
                            <option value="0" <?php echo ($mn['status'] == 0) ? "selected":"" ?>>Non-aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $mn['id']; ?>" />
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>

                </form>

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

    } else {
        // arahkan ke halaman data artikel
    }

    // kode untuk menyimpan menu ke database
    if(isset($_POST['simpan'])){

        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $url = $_POST['url'];
        $urutan = $_POST['urutan'];
        $status = $_POST['status'];

        // lakukan penyimpanan ke database
        $simpan = mysqli_query($koneksi, "UPDATE menu SET nama='$nama', url='$url', urutan='$urutan', status='$status' WHERE id=$id");

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
