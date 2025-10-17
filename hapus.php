<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';

$id = (int)($_GET['id'] ?? 0);
if ($id > 0){
    $stmt = mysqli_prepare($conn, "DELETE FROM bukutamu WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: dashboard.php");
exit;