<?php
class Toode {
    public $nimetus;
    public $hind;
    public $kogus;

    public function __construct($nimetus, $hind, $kogus) {
        $this->nimetus = $nimetus;
        $this->hind = $hind;
        $this->kogus = $kogus;
    }

    public function koguHind() {
        return $this->hind * $this->kogus;
    }

    public function muudaKogus($uusKogus) {
        $this->kogus = $uusKogus;
    }

    public function kuvamine() {
        return "{$this->nimetus} - {$this->hind} EUR - Kogus: {$this->kogus}";
    }
}

class Ostukorv {
    public $tooted = [];

    public function lisaToode($nimetus, $hind, $kogus) {
        $toode = new Toode($nimetus, $hind, $kogus);
        $this->tooted[] = $toode;
    }

    public function koguSumma() {
        $summa = 0;
        foreach ($this->tooted as $toode) {
            $summa += $toode->koguHind();
        }
        return $summa;
    }

    public function naitaSisu() {
        echo "Ostukorvi sisu:" . PHP_EOL;
        foreach ($this->tooted as $toode) {
            echo $toode->kuvamine() . PHP_EOL;
        }
    }
}

// Loo uus ostukorv
$ostukorv = new Ostukorv();

// Lisa tooteid ostukorvi
$ostukorv->lisaToode('Kohv', 5.80, 2);
$ostukorv->lisaToode('Šokolaad', 2.50, 3);
$ostukorv->lisaToode('Piim', 1.20, 4);

// Kuvame ostukorvi sisu
$ostukorv->naitaSisu();

// Kuvame ostukorvi kogusumma
echo "Ostukorvi kogu summa: " . $ostukorv->koguSumma() . " EUR" . PHP_EOL;
?>
