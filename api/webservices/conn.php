<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "erp_nag";
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//RESPON 500 : ada kesalahan di query mysql
//RESPON 501 : DATA HASIL LEMPARAN TIDAK LENGKAP
//RESPON 502 : DATA HASIL LEMPARAN TIDAK LENGKAP
//RESPON 503 : SESSION TIDAK ADA/HABIS SILAHKAN LOGIN KEMBALI
//RESPON 200 : PROSES BERHASIL DI JALANKAN



?>