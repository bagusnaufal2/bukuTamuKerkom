<?php
include 'config.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$sql = "INSERT INTO bukutamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')"; 
mysqli_query($conn, $sql);
header("Location: index.php");
?>