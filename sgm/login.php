<?php 

session_start();

include '../include/config/conn.php';


// $loc  = $_POST["loc"];

if ( isset($_POST['submit']) ) {

  $id   = $_POST["id"];
  $pw   = $_POST["pw"];
  
  $result = mysqli_query($conn, "SELECT * FROM user WHERE emp_div = 'SGM'");
  $data = mysqli_fetch_array($result);

  if ( $id === $data['emp_id'] ) {

    if( password_verify($pw, $data['password']) ) {

        // ==========  S G M   S E S S I O N  ========== //

      $_SESSION['emp_id'] = $data['emp_id'];
      $_SESSION['emp_nm'] = strtolower($data['emp_nm']);
      $_SESSION['emp_div'] = strtolower($data['emp_div']);
      header("Location: ../sgm/");
      return false;

    }

    $_SESSION['pw'] = 'Kata sandi salah!';

  }

  $_SESSION['id'] = 'Id tidak valid!';

}

date_default_timezone_set('Asia/Jakarta');
$time = date("H");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/assets/css/root.css">
    <link rel="stylesheet" href="../include/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../include/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<?php if ( $time >= 06 AND $time < 18 ): ?>
  
  <body style="background-image: url(../include/assets/img/bg.img/lotte1.jpg);">

<?php else : ?>

  <body style="background-image: url(../include/assets/img/bg.img/lotte2.jpg);">

<?php endif ?>
        
    <?php

    if (@$_SESSION['pw']) : ?>

        <style>
            .colored-toast.swal2-icon-warning {
              background-color: #F4A261 !important;
            }
        </style>

        <script>
            const Toast = Swal.mixin({
              toast: true,
              position: 'top',
              iconColor: 'white',
              customClass: {
                popup: 'colored-toast'
              },
              showConfirmButton: false,
              timer: 2500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'warning',
              title: "<?= $_SESSION['pw']; ?>",
              color: 'white'
            })
        </script>
        
    <?php

    unset($_SESSION['pw']);

    elseif (@$_SESSION['id']) : ?>

        <style>
            .colored-toast.swal2-icon-warning {
              background-color: #F4A261 !important;
            }
        </style>

        <script>
            const Toast = Swal.mixin({
              toast: true,
              position: 'top',
              iconColor: 'white',
              customClass: {
                popup: 'colored-toast'
              },
              showConfirmButton: false,
              timer: 2500,
              timerProgressBar: true
            })
            Toast.fire({
              icon: 'warning',
              title: "<?= $_SESSION['id']; ?>",
              color: 'white'
            })
        </script>
        
    <?php

    unset($_SESSION['id']);

    endif;

    ?>

    <header id="nav-menu" aria-label="navigation bar">
      <div class="container">
        <div class="nav-start">
          <a class="logo" href="../lsi06/">
            <img src="../include/assets/img/icons/logo.png" width="35" height="35" alt="Inc Logo" />
          </a>
          <h2>Store General Manager 06</h2>
      </div>
    </header>

    <!-- Page markup: Not important -->
    <main>
      <div class="cont-login">
        <h2>Welcome To</br>SGM Web</h2>
        <form action="" method="post" class="login">
          <img src="../include/assets/img/icons/logo lsi.png" alt="Inc Logo" />
          <h3>Login To Continue Access</h3>
            <input type="number" name="id" required autofocus>
            <!-- <input type="hidden" value="sgm" name="loc" required> -->
            <input type="password" name="pw" required>
            <button type="submit" name="submit" id="submit">Login <i class="fa-solid fa-right-to-bracket" style="color: #fff;"></i></button>
          <p><?= $_SERVER['REMOTE_ADDR'] ?></p>
        </form>
      </div>
    </main>
    
</body>
</html>