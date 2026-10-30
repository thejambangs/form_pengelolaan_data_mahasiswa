<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kampus";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Logika Dual Bahasa
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

// Kamus Bahasa
$teks = [
    'id' => [
        'app_title' => 'Sistem Manajemen Mahasiswa',
        'login' => 'Masuk',
        'logout' => 'Keluar',
        'add' => 'Tambah Data',
        'nim' => 'NIM',
        'name' => 'Nama',
        'class' => 'Kelas',
        'major' => 'Jurusan',
        'action' => 'Aksi',
        'edit' => 'Edit',
        'delete' => 'Hapus',
        'save' => 'Simpan',
        'back' => 'Kembali'
    ],
    'en' => [
        'app_title' => 'Student Management System',
        'login' => 'Login',
        'logout' => 'Logout',
        'add' => 'Add Data',
        'nim' => 'Student ID',
        'name' => 'Name',
        'class' => 'Class',
        'major' => 'Major',
        'action' => 'Action',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'back' => 'Back'
    ]
];
?>