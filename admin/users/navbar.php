<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><i class="fa fa-wrench"></i> Administrator Blog</a>
    </div>
    <div class="navbar-collapse collapse">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="../artikel/tambah_artikel.php"><i class="fa fa-pencil"></i> Tulis Artikel</a></li>
        <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></a></li>
        <li><a href="../logout.php" title="Log out!"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</div>
