<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

$nim = $_GET['nim'];
$delete = $mysqli->query("DELETE FROM students WHERE nim='$nim'");

if ($delete) {
    $_SESSION['success'] = true;
    $_SESSION['message'] = 'Data Berhasil Dihapus';
    header("Location: mahasiswa.php");
    exit();
} else {
    $_SESSION['success'] = false;
    $_SESSION['message'] = 'Gagal menghapus data: ' . $mysqli->error;
    header("Location: mahasiswa.php");
    exit();
}
?>
