<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi</title>
    <style>
        table {
            width: 300px;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php
        // Data pribadi dalam variabel PHP
        $nama = "Seli Pebriani";
        $jenis_kelamin = "P";
        $umur = 21;
        $berat = 54;
        $tinggi = 160;
    ?>

    <!-- Tabel Data Pribadi -->
    <table>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?php echo $jenis_kelamin; ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>: <?php echo $umur; ?></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>: <?php echo $berat; ?> kg</td>
        </tr>
        <tr>
            <td>Tinggi</td>
            <td>: <?php echo $tinggi; ?> cm</td>
        </tr>
    </table>
</body>
</html>
