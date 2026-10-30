<?php
require 'koneksi.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$error_msg = "";
if (isset($_POST['submit'])) {
    // Sanitasi data
    $nim = htmlspecialchars(trim($_POST["nim"]));
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $kelas = htmlspecialchars(trim($_POST["kelas"]));
    $jurusan = htmlspecialchars(trim($_POST["jurusan"]));

    // Validasi kelengkapan (if-else)
    if (empty($nim) || empty($nama) || empty($kelas) || empty($jurusan)) {
        $error_msg = "Semua kolom wajib diisi!";
    } else {
        $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$kelas', '$jurusan')";
        if(mysqli_query($conn, $query)){
            header("Location: index.php");
        } else {
            $error_msg = "Gagal menyimpan data (NIM mungkin duplikat).";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title><?php echo $teks[$lang]['add']; ?></title><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="card">
        <h2><?php echo $teks[$lang]['add']; ?></h2>
        <?php if($error_msg) echo "<p style='color:red;'>$error_msg</p>"; ?>
        <form action="" method="post">
            <input type="text" name="nim" placeholder="<?php echo $teks[$lang]['nim']; ?>">
            <input type="text" name="nama" placeholder="<?php echo $teks[$lang]['name']; ?>">
            <input type="text" name="kelas" placeholder="<?php echo $teks[$lang]['class']; ?>">
            <input type="text" name="jurusan" placeholder="<?php echo $teks[$lang]['major']; ?>">
            <button type="submit" name="submit" class="btn-success"><?php echo $teks[$lang]['save']; ?></button>
            <a href="index.php" class="btn-primary" style="display:block; text-align:center; margin-top:10px;"><?php echo $teks[$lang]['back']; ?></a>
        </form>
    </div>
</body>
</html>