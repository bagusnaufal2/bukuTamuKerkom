<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM bukutamu ORDER BY tanggal DESC");
?>

<h2>Dashboard Admin</h2>
<a href="logout.php">Logout</a>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) {
        ?> <tr>
            <td><?= $row['nama']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['pesan']?></td>
            <td><?= $row['tanggal']?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>