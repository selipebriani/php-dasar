<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Suhu</title>
</head>
<body>
    <h1>Konversi Satuan Suhu</h1>
    <form action="" method="post">
        <label for="celcius">Suhu (Celcius):</label>
        <input type="number" name="celcius" id="celcius" required>
        <br>
        <label for="konversi">Konversi ke:</label>
        <select name="konversi" id="konversi">
            <option value="reamur">Reamur</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
        <br><br>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $celcius = $_POST['celcius'];
        $konversi = $_POST['konversi'];
        $hasil = 0;

        switch ($konversi) {
            case 'reamur':
                $hasil = (4 / 5) * $celcius;
                echo "<p>Hasil konversi ke Reamur adalah $hasil</p>";
                break;
            case 'fahrenheit':
                $hasil = (9 / 5) * $celcius + 32;
                echo "<p>Hasil konversi ke Fahrenheit adalah $hasil</p>";
                break;
            case 'kelvin':
                $hasil = $celcius + 273;
                echo "<p>Hasil konversi ke Kelvin adalah $hasil</p>";
                break;
        }
    }
    ?>
</body>
</html>
