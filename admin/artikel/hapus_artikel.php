<?php

    if(isset($_GET["id"]) && !empty($_GET['id'])){
        // hapus artikel
        include("../../konektor.php");
        $id = $_GET["id"];
        $query = mysqli_query($koneksi, "DELETE FROM artikel WHERE id=$id");

        if($query) {
            // arahkan ke data artikel
            echo "<script> window.location = 'index.php'</script>";
        } else {
            // tampilkan pesan error
            die("Gaga menghapus: " . mysqli_error($koneksi));
        }

    } else {
        // arahkan ke data artikel
        header("location: index.php");
    }

?>
