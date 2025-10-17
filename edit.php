<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0){
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $stmt = mysqli_prepare($conn, "UPDATE bukutamu SET nama=?, email=?, pesan=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: dashboard.php');
    exit;

}

$stmt = mysqli_prepare($conn, "SELECT * FROM bukutamu WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$data) {
    header("Location: dashboard.php");
    exit;
}
?>
<h2>Edit Data Tamu</h2><form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required><br><br>

        <label>Pesan:</label><br>
        <textarea name="pesan" required><?= htmlspecialchars($data['pesan']) ?></textarea><br><br>

        <button type="submit">Update</button>
</form>
<p><a href="dashboard.php">Kembali ke Dashboard</a></p>