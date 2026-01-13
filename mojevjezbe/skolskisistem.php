<?php
class Osoba {
    private $ime;
    private $prezime;

    private $email;

    public function __construct($ime, $prezime) {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }

    public function getIme() {
        return $this->ime;
    }

    public function getPrezime() {
        return $this->prezime;
    }

    function predstaviSe() {
        return "Ja sam " . $this->ime . " " . $this->prezime . ".";
    }
}

class Ucenik extends Osoba {
    private $razred;

    private $prosjek;

    public function __construct($ime, $prezime, $razred, $prosjek) {
        parent::__construct($ime, $prezime);
        $this->razred = $razred;
        $this->prosjek = $prosjek;
    }

    public function getRazred(): mixed   {
        return $this->razred;
    }

    public function getProsjek() {
        return $this->prosjek;
    }

    public function predstaviSe() {
        return parent::predstaviSe() . " Ja sam ucenik u razredu " . $this->razred . " i moj prosjek je " . $this->prosjek . ".";
    }
}

class Nastavnik extends Osoba {
    private $predmet;
    private $iskustvo;

    public function __construct($ime, $prezime, $predmet, $iskustvo) {
        parent::__construct($ime, $prezime);
        $this->predmet = $predmet;
        $this->iskustvo = $iskustvo;
    }

    public function getPredmet() {
        return $this->predmet;
    }

    public function getIskustvo() {
        return $this->iskustvo;
    }

    public function predstaviSe() {
        return parent::predstaviSe() . " Ja sam nastavnik koji predaje " . $this->predmet . " sa " . $this->iskustvo . " godina iskustva.";
    }
}

$ucenici = [
    new Ucenik('Ivan', 'Horvat', '3A', 4.2),
    new Ucenik('Ana', 'Ivic', '2B', 3.8),
];

$nastavnici = [
    new Nastavnik('Marko', 'Kovac', 'Matematika', 12),
    new Nastavnik('Petra', 'Maric', 'Engleski', 5),
];
?>

<!doctype html>
<html lang="hr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Školski sistem — demo</title>
    
</head>

<body>
    <div class="container">
        <h1>Školski sistem — demo</h1>
        <p class="lead">Primjer korištenja klasa iz <code>skolskisistem.php</code>.</p>

        <h2>Učenici</h2>
        <div class="grid">
            <?php foreach ($ucenici as $u): ?>
                <div class="card">
                    <span class="type ucenik">Učenik</span>
                    <div class="name"><?= htmlspecialchars($u->getIme() . ' ' . $u->getPrezime()) ?></div>
                    <div class="meta">Razred: <?= htmlspecialchars($u->getRazred()) ?> — Prosjek:
                        <?= htmlspecialchars($u->getProsjek()) ?></div>
                    <a class="btn" href="#"><?= htmlspecialchars($u->predstaviSe()) ?></a>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 style="margin-top:24px">Nastavnici</h2>
        <div class="grid">
            <?php foreach ($nastavnici as $n): ?>
                <div class="card">
                    <span class="type nastavnik">Nastavnik</span>
                    <div class="name"><?= htmlspecialchars($n->getIme() . ' ' . $n->getPrezime()) ?></div>
                    <div class="meta">Predmet: <?= htmlspecialchars($n->getPredmet()) ?> — Iskustvo:
                        <?= htmlspecialchars($n->getIskustvo()) ?> godina</div>
                    <a class="btn" href="#"> <?= htmlspecialchars($n->predstaviSe()) ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>