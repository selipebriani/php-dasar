<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        if ($_SESSION['login'] != true) {
            header("Location: login.php");
            exit;
        }
    }
    $mysqli = new mysqli('localhost', 'root', '', 'absen');

    $Nim = $_GET['nim'];
    $delete = $mysqli->query("DELETE  FROM mahasiswa WHERE Nim='$Nim'");

    if($delete) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = 'Data Berhasil Dihapus';
        header("Location: Mahasiwa.php");
        exit();
    }
?>