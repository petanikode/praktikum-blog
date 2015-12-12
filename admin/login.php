<?php

if(isset($_POST['login'])){

    include('../konektor.php');
    session_start();

    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");

    if(mysqli_num_rows($query) > 0){
        // login berhasil catat session
        $_SESSION['username'] = $user;
        // alihkan ke halaman admin
        header("location: index.php");
    } else {
        // login gagal user tidak terdaftar
        $login_gagal = "Login gagal, silahkan coba lagi!";
    }


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../bootstrap/css/style-admin.css" />
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css" />
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default panel-login">
                  <div class="panel-heading">Login Admin</div>
                  <div class="panel-body">

                    <form role="form" action="" method="POST">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="password" name="password">
                      </div>
                      <?php if(isset($login_gagal)) { ?>
                      <div class="form-group alert alert-warning">
                          <p><i class="fa fa-warning"></i> <?php echo $login_gagal; ?></p>
                      </div>
                      <?php } ?>

                      <button type="submit" name="login" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Login</button>
                    </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
