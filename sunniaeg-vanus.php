<!DOCTYPE html>
<html>
<head>
    <title>Inimeste sünniaeg ja vanus</title>
</head>
<body>
    <h1>Inimeste sünniaeg ja vanus</h1>

    <?php
    $inimesteAndmed = [
        ["nimi" => "Mari Maasikas", "isikukood" => "38705123568"],
        ["nimi" => "Jaan Jõesaar", "isikukood" => "49811234567"],
        ["nimi" => "Kristiina Kukk", "isikukood" => "39203029876"],
        ["nimi" => "Margus Mustikas", "isikukood" => "49807010346"],
        ["nimi" => "Jaak Järve", "isikukood" => "39504234985"],
        ["nimi" => "Kadi Kask", "isikukood" => "39811136789"]
    ];

    function leiabSunniajaJaVanuse($isikukood) {
        $sunniaeg = "Sünniaeg teadmata";
        $vanus = "Vanus teadmata";

        if (strlen($isikukood) == 11) {
            $sunniaeg = substr($isikukood, 5, 2) . "." . substr($isikukood, 3, 2) . ".19" . substr($isikukood, 1, 2);
            $sunniaegObjekt = DateTime::createFromFormat('d.m.Y', $sunniaeg);
            if ($sunniaegObjekt !== false) {
                $taanudAasta = $sunniaegObjekt->diff(new DateTime('now'))->y;
                $vanus = $taanudAasta;
            }
        }

        return ["sunniaeg" => $sunniaeg, "vanus" => $vanus];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nimi = $_POST["nimi"];
        $isikukood = $_POST["isikukood"];
        $andmed = leiabSunniajaJaVanuse($isikukood);
        $inimesteAndmed[] = ["nimi" => $nimi, "isikukood" => $isikukood, "sunniaeg" => $andmed["sunniaeg"], "vanus" => $andmed["vanus"]];
    }
    ?>

    <h2>Olemasolevad andmed:</h2>
    <table border="1">
        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>Sünniaeg</th>
            <th>Vanus</th>
        </tr>
        <?php
        foreach ($inimesteAndmed as $inimene) {
            echo "<tr>";
            echo "<td>" . $inimene["nimi"] . "</td>";
            echo "<td>" . $inimene["isikukood"] . "</td>";
            echo "<td>" . $inimene["sunniaeg"] . "</td>";
            echo "<td>" . $inimene["vanus"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Lisa uus inimene:</h2>
    <form method="post" action="">
        <label for="nimi">Nimi:</label>
        <input type="text" name="nimi" id="nimi" required><br>
        <label for="isikukood">Isikukood:</label>
        <input type="text" name="isikukood" id="isikukood" pattern="[0-9]{11}" required><br>
        <input type="submit" name="lisauus" value="Lisa uus inimene">
    </form>
</body>
</html>
