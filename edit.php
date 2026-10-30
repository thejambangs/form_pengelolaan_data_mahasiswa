<?php
require 'koneksi.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$nim_get = $_GET["nim"];
$mhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$nim_get'");
$row = mysqli_fetch_assoc($mhs);

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $kelas = htmlspecialchars(trim($_POST["kelas"]));
    $jurusan = htmlspecialchars(trim($_POST["jurusan"]));

    if (!empty($nama) && !empty($kelas) && !empty($jurusan)) {
        mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE nim='$nim_get'");
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head><title><?php echo $teks[$lang]['edit']; ?></title><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="card">
        <h2><?php echo $teks[$lang]['edit']; ?></h2>
        <form action="" method="post">
            <input type="text" name="nim" value="<?php echo $row['nim']; ?>" disabled>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
            <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required>
            <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>
            <button type="submit" name="submit" class="btn-success"><?php echo $teks[$lang]['save']; ?></button>
        </form>
    </div>
</body>
</html>