<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

$study_program = $mysqli->query("SELECT * FROM study_program");

if (isset($_POST['nim']) && isset($_POST['nama']) && isset($_POST['study_program_id'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $study_program_id = $_POST['study_program_id'];

    $insert = $mysqli->query("INSERT INTO students (nim, nama, study_program_id) VALUES ('$nim', '$nama', '$study_program_id')");
    if ($insert) {
        $_SESSION['message'] = 'Data berhasil ditambahkan';
        $_SESSION['success'] = true;
        header("Location: mahasiswa.php");
        exit();
    } else {
        $_SESSION['message'] = 'Gagal menambahkan data: ' . $mysqli->error;
        $_SESSION['success'] = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Form Tambah Mahasiswa</h1>
        <form method="POST">
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
                        <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="mahasiswa.php" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
