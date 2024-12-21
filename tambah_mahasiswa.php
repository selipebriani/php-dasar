<?php
// tambah_mahasiswa.php

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $study_program_id = $_POST['study_program_id']; // Disesuaikan dengan `tedc.sql`

    $stmt = $mysqli->prepare("INSERT INTO students (nim, nama, study_program_id) VALUES (?, ?, ?)");
    $stmt->bind_param('ssi', $nim, $nama, $study_program_id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data: " . $stmt->error . "');</script>";
    }
}

// Mengambil data dari tabel `study_program` sesuai dengan `tedc.sql`
$study_program = $mysqli->query("SELECT id, name FROM study_program");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3" align="center">Tambah Mahasiswa</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="study_program_id" class="form-label">Program Studi</label>
                <select class="form-select" id="study_program_id" name="study_program_id" required>
                    <option value="">Pilih Program Studi</option>
                    <?php while ($row = $study_program->fetch_assoc()) { ?>
                        <option value="<?= $row['id']; ?>">
                            <?= $row['name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="mahasiswa.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
