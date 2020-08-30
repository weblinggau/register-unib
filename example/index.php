<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div class="login-clean">

        <form method="post" action="cek.php">
            <h2 class="sr-only">Register Yuk</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <?php 
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
            ?>
            <div class="alert <?= $_SESSION['atribut']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['pesan']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php 
                }
                $_SESSION['pesan'] = '';
                $_SESSION['atribut'] = '';
            ?>

            <div class="form-group"><input class="form-control" type="text" name="npm" placeholder="NPM"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password Portal"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">REGISTER</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>