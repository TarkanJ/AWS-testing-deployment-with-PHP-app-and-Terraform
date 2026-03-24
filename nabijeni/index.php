<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Výpočet doby nabíjení baterie</title>
    <style>
        body {
            background-image: url("pozadi.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            padding-top: 100px;
        }

        form {
            background-color: rgba(0, 0, 0, 0.6);
            display: inline-block;
            padding: 20px;
            border-radius: 10px;
        }

        input[type="number"] {
            padding: 5px;
            margin: 10px;
            width: 80px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #1e90ff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        img {
            margin-top: 50px;
            width: 300px;
        }
    </style>
</head>
<body>

    <h1>Výpočet doby nabíjení akumulátoru (NiMH, Li-Ion, LiPol atd.)</h1>

    <form method="post">
        <label for="kapacita">Kapacita baterie (mAh):</label>
        <input type="number" name="kapacita" id="kapacita" step="0.01" required>

        <label for="proud">Nabíjecí proud (mA):</label>
        <input type="number" name="proud" id="proud" step="0.01" required>

        <br>
        <input type="submit" value="Spočítat">
    </form>

    <?php
    $dobaNabijeni = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kapacita = isset($_POST['kapacita']) ? (float)$_POST['kapacita'] : null;
        $proud = isset($_POST['proud']) ? (float)$_POST['proud'] : null;

        if ($kapacita !== null && $proud !== null) {
            $dobaNabijeni = (1.3 * $kapacita) / $proud; /* 1.3 - ztráta účinnosti nabíjení 30% */

            $hodiny = floor($dobaNabijeni);  /* funkce pro oddělení celých čísel a desetinné části */
            $minuty = round(($dobaNabijeni - $hodiny) * 60);

            echo "<p>Doba nabíjení: <strong>{$hodiny} hodin {$minuty} minut</strong></p>";
            echo "<p>Zadaná kapacita baterie: <strong>{$kapacita} mAh</strong></p>";
            echo "<p>Zadaná velikost proudu: <strong>{$proud} mA</strong></p>";  

           /*  echo "<p>Celková doba nabíjení: <strong>" . round($dobaNabijeni, 2) . " hodin</strong></p>";   zaokrouhleni na 2 deset.mista */

        }
    }
    ?>

    <img src="RC_car.jpg" alt="RC auto">

<br><br>
<h4 ALIGN=LEFT>&copy; Martino 2025</h4>

</body>
</html>
