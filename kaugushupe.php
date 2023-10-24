<!DOCTYPE html>
<html>
<head>
    <title>Kaugushüppe tulemused</title>
</head>
<body>
    <h1>Kaugushüppe tulemused</h1>

    <?php
    $opilased = [
        ["nimi" => "Anna", "tulemused" => [4.5, 4.8, 4.6]],
        ["nimi" => "Mart", "tulemused" => [5.2, 5.1, 5.4]],
        ["nimi" => "Kati", "tulemused" => [4.9, 5.0, 4.7]],
        ["nimi" => "Jaan", "tulemused" => [4.3, 4.6, 4.4]],
        ["nimi" => "Liis", "tulemused" => [5.0, 5.2, 5.1]],
        ["nimi" => "Peeter", "tulemused" => [5.5, 5.3, 5.4]],
        ["nimi" => "Eva", "tulemused" => [4.8, 4.9, 4.7]],
        ["nimi" => "Marten", "tulemused" => [4.7, 4.6, 4.8]],
        ["nimi" => "Kairi", "tulemused" => [5.1, 5.3, 5.0]],
        ["nimi" => "Rasmus", "tulemused" => [4.4, 4.5, 4.3]]
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opilaseNimi = $_POST["opilaseNimi"];
        $tulemus = (float)$_POST["tulemus"];

        // Leia õige õpilane
        $opilane = null;
        foreach ($opilased as &$opilane) {
            if ($opilane["nimi"] == $opilaseNimi) {
                $opilane["tulemused"][] = $tulemus;
            }
        }
    }
    ?>

    <h2>Olemasolevad tulemused:</h2>
    <ul>
        <?php
        foreach ($opilased as $opilane) {
            $nimi = $opilane["nimi"];
            $tulemused = $opilane["tulemused"];
            $parimTulemus = max($tulemused);
            $keskmineTulemus = round(array_sum($tulemused) / count($tulemused), 2);

            echo "<li>$nimi - Tulemused: " . implode(", ", $tulemused) . " - Parim tulemus: $parimTulemus - Keskm. tulemus: $keskmineTulemus</li>";
        }
        ?>
    </ul>

    <h2>Lisa uus tulemus:</h2>
    <form method="post" action="">
        <label for="opilaseNimi">Õpilase nimi:</label>
        <select name="opilaseNimi" id="opilaseNimi">
            <?php
            foreach ($opilased as $opilane) {
                echo "<option value='" . $opilane["nimi"] . "'>" . $opilane["nimi"] . "</option>";
            }
            ?>
        </select><br>
        <label for="tulemus">Kaugushüppe tulemus (meetrites):</label>
        <input type="number" step="0.01" name="tulemus" id="tulemus" required><br>
        <input type="submit" name="lisatulemus" value="Lisa uus tulemus">
    </form>
</body>
</html>
