<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

$result = $mysqli->query("
    SELECT students.nim, students.nama, study_program.name AS prodi
    FROM students
    INNER JOIN study_program ON students.study_program_id = study_program.id
");

$mahasiswa = [];
while ($row = $result->fetch_assoc()) {
    array_push($mahasiswa, $row);
}

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Data Mahasiswa</h1>
        <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true) { ?>
            <div class="alert alert-success" role="alert">
                <?= $_SESSION['message'] ?>
            </div>
        <?php } ?>
        <a href="tambah_mahasiswa.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['prodi']; ?></td>
                        <td>
                            <a href="edit_mahasiswa.php?nim=<?= $row['nim']; ?>" class="btn btn-success">Edit</a>
                            <a href="hapus_mahasiswa.php?nim=<?= $row['nim']; ?>" class="btn btn-danger" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
session_unset();
?>
