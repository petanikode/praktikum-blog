<?php include("konektor.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blog Programer PHP</title>
        <link rel="icon" href="img/ArdiantaPargo.png" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="bootstrap/css/style.css" />
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css" />
    </head>
    <body>

        <header>
            <?php include("header.php"); ?>
        </header>

        <nav class="navbar navbar-default"><?php include("menu.php"); ?></nav>

        <article>

            <div class="container wrap">
                <div class="row">
                    <div class="col-md-12">

                        <!-- ARTIKEL ------------------->
                        <?php

                            if(isset($_GET['id']) && !empty($_GET['id'])){
                                $id = $_GET['id'];


                                $query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id='$id' ORDER BY tanggal DESC");

                                if(mysqli_num_rows($query) > 0 ){

                                    // looping Artikel
                                    while($artikel = mysqli_fetch_array($query)){
                                        echo "<div class='artikel-kop'>";
                                        echo "<h2><b>".$artikel['judul']."</b></h2>";
                                        echo "<p class='artikel-tanggal'>Oleh <b>".$artikel['penulis']."</b>, pada ".$artikel['tanggal']."</p>";
                                        echo "</div>";

                                        echo "<div class='artikel-isi'>";
                                        echo $artikel['isi'];
                                        echo "</div><hr/>";

                                    }
                                } else {
                                    include("404.php");
                                }

                            } else {
                                include("404.php");
                            }

                        ?>
                        <!-- END ARTIKEL --------------->
                    </div>
                </div>
            </div>

        </article>

        <footer>
            <?php include("footer.php"); ?>
        </footer>

    </body>
</html>
