<?php
require 'koneksi.php';
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

$nim = $_GET["nim"];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");
header("Location: index.php");
?>