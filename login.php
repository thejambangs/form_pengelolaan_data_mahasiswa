<?php
require 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$error = false;
if (isset($_POST['login'])) {
    // Sanitasi input
    $username = htmlspecialchars($_POST['username']);
    $password = md5($_POST['password']); 

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($result) === 1) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - <?php echo $teks[$lang]['app_title']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="card">
        <h2><?php echo $teks[$lang]['app_title']; ?></h2>
        <?php if($error) echo "<p style='color:red;'>Username / Password salah!</p>"; ?>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn-primary"><?php echo $teks[$lang]['login']; ?></button>
        </form>
    </div>
</body>
</html>