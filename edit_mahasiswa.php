<?php
$mysqli = new mysqli('localhost', 'root', '', 'tedc');

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $result = $mysqli->query("SELECT * FROM students WHERE nim = '$nim'");
    $mahasiswa = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $study_program_id = $_POST['study_program_id'];

        $stmt = $mysqli->prepare("UPDATE students SET nama = ?, study_program_id = ? WHERE nim = ?");
        $stmt->bind_param('sis', $nama, $study_program_id, $nim);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diupdate!'); window.location.href='mahasiswa.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    $study_programs = $mysqli->query("SELECT * FROM study_program");
} else {
    echo "<script>alert('NIM tidak ditemukan!'); window.location.href='mahasiswa.php';</script>";
    exit;
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3" align="center">Edit Mahasiswa</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>" required>
            </div>
            <div class="mb-3">
    <label for="study_program_id" class="form-label">Program Studi</label>
    <select class="form-select" id="study_program_id" name="study_program_id" required>
        <option value="">Pilih Program Studi</option>
        <?php while ($row = $study_programs->fetch_assoc()) { ?>
            <option value="<?= $row['id']; ?>" <?= $mahasiswa['study_program_id'] == $row['id'] ? 'selected' : ''; ?>>
                <?= $row['name']; ?>
            </option>
        <?php } ?>
    </select>
</div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="mahasiswa.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>