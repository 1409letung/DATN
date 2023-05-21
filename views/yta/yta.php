<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title> Y tá </title>
</head>
<?php
    if (session_status() == PHP_SESSION_NONE) {
        ob_start();
        session_start();
    }
    if(!isset($_SESSION['login'])){
         header('Location:../../login.php');
         }else{
            if(!isset($_SESSION['yta'])){
               header('Location:../../login.php');
         }
     }
?>
<body>
    <div class="d-flex" id="wrapper">
        <?php
            include_once 'pageYta/sidebar.php';
            include_once 'pageYta/header.php';
            include_once 'pageYta/content.php';
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>