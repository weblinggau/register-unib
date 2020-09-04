<?php 
session_start();
require '../pak.php';

$npm = $_POST['npm'];
$pass = $_POST['password'];

$curl = new zpmData();
$cek = $curl->logNpm($npm,$pass);

if (empty($cek['npm']) && $_POST['jts'] == '') {
	$_SESSION['atribut'] = 'alert-warning';
	$_SESSION['pesan'] = 'NPM dan Password salah juga mungkin gangguan lain.!';
	header("location:index.php");
}else{
    if (isset($_POST['jts'])) {
    $_SESSION['atribut'] = 'alert-success';
    $_SESSION['pesan'] = 'Data berhasil tersimpan, pendaftaran berhasil';
    header("location:index.php");
    }
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

        <form method="post">
        	<input type="hidden" name="jts" value="add">
            <div class="form-group"><input class="form-control" type="text" name="npm" placeholder="NPM" value="<?= $cek['npm']; ?>"></div>
            <div class="form-group"><input class="form-control" type="text" name="nama" placeholder="Nama" value="<?= $cek['nama']; ?>"></div>
            <div class="form-group"><input class="form-control" type="text" name="TTL" placeholder="ttl" value="<?= $cek['ttl']; ?>"></div>
            <div class="form-group"><input class="form-control" type="text" name="prodi" placeholder="prodi" value="<?= $cek['prodi']; ?>"></div>
            <div class="form-group"><input class="form-control" type="text" name="agama" placeholder="agama" value="<?= $cek['agama']; ?>"></div>
            <div class="form-group"><input class="form-control" type="text" name="slta" placeholder="slta" value="<?= $cek['slta']; ?>"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">REGISTER</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>