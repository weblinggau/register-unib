<?php 
session_start();
require 'pak.php';

$npm = $_POST['npm'];
$pass = $_POST['password'];

$cek = dataPortal($npm,$pass);

if (empty($cek)) {
	
}


 ?>