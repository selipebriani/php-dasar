<?php
// hapus_mahasiswa.php

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $stmt = $mysqli->prepare("DELETE FROM students WHERE nim = ?");
    $stmt->bind_param('s', $nim);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $stmt->error . "'); window.location.href='mahasiswa.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('NIM tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
}
?>