<?php
require_once 'Korisnik.php';
require_once 'Film.php';
require_once 'Serija.php';
require_once 'Videoteka.php';

$videoteka = new Videoteka("Moja Videoteka");
$film1 = new Film("Inception", 2010, "Sci-Fi");
$film1->setOcjena(9);
$film2 = new Film("The Godfather", 1972, "Crime");
$film2->setOcjena(10);
$serija1 = new Serija("Breaking Bad", 2008, "Crime",
5, 62);

$videoteka->dodajUKatalog($film1);
$videoteka->dodajUKatalog($film2);
$videoteka->dodajUKatalog($serija1);

echo "Katalog Videoteke:\n";
foreach ($videoteka->najboljeOcijenjeni(3) as $stavka
) {
    echo $stavka->getInfo() . "\n";
}


?>