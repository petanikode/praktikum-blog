<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Menu <a href="tambah_menu.php" class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i> Menu</a></h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
            <th>Nama Menu</th>
            <th>URL</th>
            <th>Urutan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <tbody>
        <?php

            // ambil data menud ari database
            $query = mysqli_query($koneksi, "SELECT * FROM menu");

            while($menu = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$menu['nama']."</td>";
                echo "<td>".$menu['url']."</td>";
                echo "<td>".$menu['urutan']."</td>";
                echo ($menu['status'] == 1) ? "<td>Aktif</td>":"<td>Non-aktif</td>";
                echo "<td><a href='edit_menu.php?id=".$menu['id']."' class='btn btn-info'><i class='fa fa-edit'></i></a> <a href='hapus_menu.php?id=".$menu['id']."' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
                echo "</tr>";
            }

         ?>

      </tbody>
    </table>
  </div>
</div>
