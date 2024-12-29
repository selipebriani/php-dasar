<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

$nim = $_GET['nim'];
$mahasiswa = $mysqli->query("SELECT * FROM students WHERE nim='$nim'");
$data = $mahasiswa->fetch_assoc();

$study_program = $mysqli->query("SELECT * FROM study_program");

if (isset($_POST['nama']) && isset($_POST['study_program_id'])) {
    $nama = $_POST['nama'];
    $study_program_id = $_POST['study_program_id'];

    $update = $mysqli->query("UPDATE students SET nama='$nama', study_program_id='$study_program_id' WHERE nim='$nim'");
    if ($update) {
        $_SESSION['message'] = 'Data berhasil diperbarui';
        $_SESSION['success'] = true;
        header("Location: mahasiswa.php");
        exit();
    } else {
        $_SESSION['message'] = 'Gagal memperbarui data: ' . $mysqli->error;
        $_SESSION['success'] = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Form Edit Mahasiswa</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="study_program_id" class="form-label">Program Studi</label>
                <select class="form-select" id="study_program_id" name="study_program_id" required>
                    <?php while ($row = $study_program->fetch_assoc()) { ?>
                        <option value="<?= $row['id']; ?>" <?= $row['id'] == $data['study_program_id'] ? 'selected' : ''; ?>>
                            <?= $row['name']; ?>
                        </option>
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
