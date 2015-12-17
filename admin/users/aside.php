<div class="col-sm-3 col-md-2 sidebar">

    <ul class="nav nav-sidebar">
        <li <?php echo isset($home)? $home : ""; ?>><a href="../index.php"><i class="fa fa-home fa-lg"></i> Home</a></li>
        <li <?php echo isset($artikel)? $artikel : ""; ?>><a href="../artikel"><i class="fa fa-newspaper-o fa-lg"></i> Artikel</a></li>
        <li <?php echo isset($menu)? $menu : ""; ?>><a href="../menu"><i class="fa fa-th-list fa-lg"></i> Menu</a></li>
        <li <?php echo isset($user)? $user : ""; ?>><a href="index.php"><i class="fa fa-users fa-lg"></i> Users</a></li>
    </ul>
</div>
