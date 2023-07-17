<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/assets/css/root.css">
    <link rel="stylesheet" href="include/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="include/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
        
    <?php

    if (@$_SESSION['pw']) : ?>

        <style>
            .colored-toast.swal2-icon-success {
              background-color: #2481C1 !important;
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
              icon: 'success',
              title: "<?= $_SESSION['pw']; ?>",
              color: 'white'
            })
        </script>
        
    <?php

    unset($_SESSION['pw']);

    elseif (@$_SESSION['id']) : ?>

        <style>
            .colored-toast.swal2-icon-success {
              background-color: #2481C1 !important;
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
              icon: 'success',
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
            <img src="include/assets/img/icons/logo.png" width="35" height="35" alt="Inc Logo" />
          </a>
          <h2>Lotte Grosir Ciputat</h2>
      </div>

        <div class="nav-end">
          <div class="right-container">
            <nav class="menu">
              <ul class="menu-bar">
                <li id="link"><a class="nav-link" href="sgm/">SGM</a></li>
              </ul>
            </nav>
          </div>
          <button id="hamburger" aria-label="hamburger" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-bars" style="color: #636363;"></i>
          </button>
        </div>
      </div>
    </header>

    <!-- Page markup: Not important -->
    <main>
      <div class="cont-login">
        <h2>Welcome To</br>LSI06 Web</h2>
        <form action="include/config/login_system.php" method="post" class="login">
          <img src="include/assets/img/icons/logo lsi.png" alt="Inc Logo" />
          <h3>Login To Continue Access</h3>
            <input type="number" name="id" required autofocus>
            <input type="password" name="pw" required>
            <input type="hidden" value="<?= strtolower($body) ?>" name="loc" required>
            <button type="submit" name="submit" id="submit">Login <i class="fa-solid fa-right-to-bracket" style="color: #fff;"></i></button>
          <p><?= $_SERVER['REMOTE_ADDR'] ?></p>
        </form>
      </div>
    </main>
    
</body>
</html>