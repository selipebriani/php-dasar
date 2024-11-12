<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mahasiswa</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">List Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Data mahasiswa dalam array
            $mahasiswa = [
                ["nim" => "D21211001", "nama" => "Alfita Radianti Tianasari"],
                ["nim" => "D21211002", "nama" => "Cahya Julianti"],
                ["nim" => "D21211003", "nama" => "Dasmiah Sefriani"],
                ["nim" => "D21211004", "nama" => "Desi Syifa Fitria"],
                ["nim" => "D21211016", "nama" => "Seli Pebriani"], 
                ["nim" => "D21211006", "nama" => "Gita Septiani"],
                ["nim" => "D21211007", "nama" => "Ikhlas Waduana"],
                ["nim" => "D21211008", "nama" => "Intan Khoirunnisa"]
            ];

            // Menampilkan data
            $no = 1;
            foreach ($mahasiswa as $mhs) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$mhs['nim']}</td>
                    <td>{$mhs['nama']}</td>
                </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
