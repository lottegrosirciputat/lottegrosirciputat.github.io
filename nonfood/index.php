<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/assets/css/root.css">
    <link rel="stylesheet" href="../include/assets/css/sgm_patrol/upload.css">
    <link rel="stylesheet" href="../include/assets/css/sgm_patrol/summary.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../include/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

    <?php

    if (@$_SESSION['upload-patrol']) : ?>

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
              title: "<?= $_SESSION['upload-patrol']; ?>",
              color: 'white'
            })

            $(document).ready(function(){

              $('#content').load('../applications/sgm_patrol/action_patrol.php');

            });
        </script>
        
    <?php

    unset($_SESSION['upload-patrol']);

    endif;

    ?>

  <?php include 'navbar.php' ?>

    <!-- Page markup: Not important -->
    <main id="content">
      <h1>Good <span id="greeting"></span> <span class="user">Lorem Ipsum</span></h1>
      <!-- <p>
        Want to learn how to make this?
        <a style="text-decoration: underline; color: var(--primary-color)" href="https://www.freecodecamp.org/news/how-to-build-a-responsive-navigation-bar-with-dropdown-menu-using-javascript/" target="_blank">Read the tutorial</a>
      </p> -->
    </main>

    <script src="../include/assets/js/index.js"></script>
    <script src="../include/assets/js/greeting.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#content').load('../applications/sgm_patrol/action_patrol.php');
 
        $('.nav-start a').click(function(){

          var hal = $(this).attr('href');

          $('#content').load(hal+'.php');

          return false;

        });

      });
    </script>
    
</body>
</html>