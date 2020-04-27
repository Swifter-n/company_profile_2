<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dinas';

$db = mysqli_connect($server, $user, $pass, $dbname) or die(mysqli_error($db));

if (!$db) {
	die("Koneksi Gagal" . mysqli_connect_error());
} else {
	//echo "Koneksi Berhasil";
}
