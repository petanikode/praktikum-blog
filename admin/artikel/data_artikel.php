<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Semua Artikel <a href="tambah_artikel.php" class="btn btn-success pull-right"><i class="fa fa-plus-circle fa-lg"></i> Artikel Baru</a></h2>
  <div class="table-responsive">

    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
          <?php
            $query = mysqli_query($koneksi, "SELECT id, judul, penulis, tanggal FROM artikel");

            while ($artikel = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$artikel['id']."</td>";
                echo "<td><b>".$artikel['judul']."</b><br/>";
                echo "<a href='edit_artikel.php?id=".$artikel['id']."'><i class='fa fa-pencil'></i> Edit</a> | ";
                echo "<a href='hapus_artikel.php?id=".$artikel['id']."'><i class='fa fa-trash'></i> Hapus</a>";
                echo "</td>";
                echo "<td>".$artikel['penulis']."</td>";
                echo "<td>".$artikel['tanggal']."</td>";
                echo "</tr>";
            }
          ?>
      </tbody>
    </table>

  </div>
</div>
