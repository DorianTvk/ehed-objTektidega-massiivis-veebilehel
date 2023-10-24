<!DOCTYPE html>
<html>
<head>
    <title>Nimed</title>
</head>
<body>
    <h1>Nimed</h1>

    <?php
    $nimed = [
        "mari maasikas", "jaan jõesaar", "kristiina kukk", "margus mustikas", "jaak järve", "kadi kask",
        "Toomas Tamm", "Kadi Meri", "Leena Laas", "Madis Mets", "Hannes Hõbe", "Anu Allikas", 
        "Kristjan Käär", "Eva Esimene", "Jüri Jõgi", "Liis Lepik", "Kalle Kask", "Tiina Teder", "Kaidi Koppel", "tiina Toom"
    ];

    function formaatNimed($nimed) {
        $korrektsedNimed = [];
        foreach ($nimed as $nimi) {
            $nimedOsad = explode(" ", $nimi);
            $eesnimi = ucfirst(strtolower($nimedOsad[0]));
            $perenimiOsad = explode(" ", $nimi);
            $perenimi = strtolower($perenimiOsad[count($perenimiOsad) - 1]);
            $email = str_replace(["ä", "ö", "ü", "õ"], ["a", "o", "u", "o"], $perenimi) . "@tthk.ee";
            $korrektsedNimed[] = ["eesnimi" => $eesnimi, "perenimi" => $perenimi, "email" => $email];
        }
        return $korrektsedNimed;
    }

    function otsiNime($otsitavNimi, $nimed) {
        $leitudNimed = [];
        foreach ($nimed as $nimi) {
            if (strpos(strtolower($nimi["eesnimi"]), $otsitavNimi) !== false || strpos($nimi["perenimi"], $otsitavNimi) !== false) {
                $leitudNimed[] = $nimi["eesnimi"] . " " . $nimi["perenimi"];
            }
        }
        if (!empty($leitudNimed)) {
            echo "Leitud nimed: " . implode(", ", $leitudNimed);
        } else {
            echo "Nime ei leitud.";
        }
    }
    ?>
    <form method="post" action="">
        <input type="text" name="nimi" placeholder="Otsi nime...">
        <input type="submit" name="otsi" value="Otsi">
    </form>
    <?php
    if (isset($_POST['otsi'])) {
        $otsitavNimi = strtolower($_POST['nimi']);
        otsiNime($otsitavNimi, formaatNimed($nimed));
    }
    ?>
</body>
</html>
