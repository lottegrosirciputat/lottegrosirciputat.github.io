<?php

if ( $_GET['port'] == 'user' ) {
  $head = 'Lotte Grosir Ciputat';
  $body = 'LSI06';
} else {
  $head = 'Store General Manager 06';
  $body = 'SGM';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/assets/css/root.css">
    <link rel="stylesheet" href="include/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header id="nav-menu" aria-label="navigation bar">
      <div class="container">
        <div class="nav-start">
          <a class="logo" href="../lsi06/">
            <img src="include/assets/img/icons/logo.png" width="35" height="35" alt="Inc Logo" />
          </a>
          <h2><?= $head ?></h2>
      </div>
    </header>

    <!-- Page markup: Not important -->
    <main>
      <div class="cont-login">
        <h2>Welcome To</br><?= $body ?> Web</h2>
        <form action="include/config/login_system.php" method="post" class="login">
          <img src="include/assets/img/icons/logo lsi.png" alt="Inc Logo" />
          <h3>Login To Continue Access</h3>
            <input type="number" name="id" required autofocus>
            <input type="hidden" value="<?= strtolower($body) ?>" name="loc" required>
            <input type="password" name="pw">
            <button type="submit" name="submit" id="submit">Login <i class="fa-solid fa-right-to-bracket" style="color: #fff;"></i></button>
          <p><?= $_SERVER['REMOTE_ADDR'] ?></p>
        </form>
      </div>
    </main>
    
</body>
</html>