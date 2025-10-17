<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu</title>
</head>
<body>
    <h1>Buku Tamu</h1>
    <form action="simpan.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label>
        <input type="text" name="email" required><br><br>

        <label>Pesan:</label>
        <input type="text" name="pesan" required><br><br>

        <button type="submit">Kirim</button>
    </form>
    <hr>
    <h2>Daftar Tamu</h2>
    <?php
    include 'config.php';
    $result = mysqli_query($conn, "SELECT * FROM bukutamu ORDER BY tanggal DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><b>".$row['nama']."</b> (".$row['email'].")<br>";
        echo $row['pesan']."<br><i>".$row['tanggal']."</i></p></hr>";
    }
    ?>
</body>
</html>