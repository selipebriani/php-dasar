<?php
// Koneksi ke database
$mysqli = new mysqli('localhost', 'root', '', 'tedc');



// Query untuk mengambil data mahasiswa beserta program studi
$result = $mysqli->query ("SELECT students.nim, students.nama, study_program.name AS program_studi
          FROM students
          LEFT JOIN study_program ON students.study_program_id = study_program.id
          WHERE students.study_program_id = 11 OR students.study_program_id IS NULL");


// Array untuk menyimpan data mahasiswa
$mahasiswa = [];

    while ($row = $result->fetch_assoc()) {
        array_push($mahasiswa, $row);
    

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3 text-center">Daftar Mahasiswa Politeknik TEDC Bandung</h2>
        <a href="tambah_mahasiswa.php" class="btn btn-success mb-3">Tambah Mahasiswa</a>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no =1; foreach ($mahasiswa as $value) {?>
                    <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nim']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['program_studi'] == null ? 'NULL' : $value['program_studi'];?></td>
                        </tr>
                    <?php } ?>
               
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
