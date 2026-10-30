<?php
require 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $teks[$lang]['app_title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $teks[$lang]['app_title']; ?></h1>
            <div class="nav-links">
                <a href="?lang=id" class="btn-lang">ID</a> | 
                <a href="?lang=en" class="btn-lang">EN</a>
                <a href="logout.php" class="btn-danger"><?php echo $teks[$lang]['logout']; ?></a>
            </div>
        </div>

        <a href="tambah.php" class="btn-success"><?php echo $teks[$lang]['add']; ?></a>
        
        <table>
            <tr>
                <th><?php echo $teks[$lang]['nim']; ?></th>
                <th><?php echo $teks[$lang]['name']; ?></th>
                <th><?php echo $teks[$lang]['class']; ?></th>
                <th><?php echo $teks[$lang]['major']; ?></th>
                <th><?php echo $teks[$lang]['action']; ?></th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($mahasiswa)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row["nim"]); ?></td>
                <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                <td><?php echo htmlspecialchars($row["kelas"]); ?></td>
                <td><?php echo htmlspecialchars($row["jurusan"]); ?></td>
                <td>
                    <a href="edit.php?nim=<?php echo $row["nim"]; ?>" class="btn-primary"><?php echo $teks[$lang]['edit']; ?></a>
                    <a href="hapus.php?nim=<?php echo $row["nim"]; ?>" class="btn-danger" onclick="return confirm('Yakin hapus?');"><?php echo $teks[$lang]['delete']; ?></a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>