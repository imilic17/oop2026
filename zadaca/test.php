<?php
require_once 'Korisnik.php';
require_once 'Film.php';
require_once 'Serija.php';
require_once 'Videoteka.php';

$videoteka = new Videoteka("Moja Videoteka");

$film1 = new Film("Inception", 2010, "Sci-Fi");
$film1->setOcjena(9);

$film2 = new Film("Titanic", 1997, "Drama");
$film2->setOcjena(8);

$serija1 = new Serija("Breaking Bad", 2008, "Crime", 5, 62);
$serija1->setOcjena(10);

$korisnik = new Korisnik("Ana", "ana@email.com");
$korisnik->dodajNaListuZelja($film1);
$korisnik->dodajNaListuZelja($film2);
$korisnik->dodajNaListuZelja($serija1);

$videoteka->registrirajKorisnika($korisnik);
$videoteka->dodajUKatalog($film1);
$videoteka->dodajUKatalog($film2);
$videoteka->dodajUKatalog($serija1);

echo "Katalog Videoteke:\n";
foreach ($videoteka->najboljeOcijenjeni(3) as $stavka) {
    echo $stavka->getInfo() . "\n";
}

echo "\nStatistika Videoteke:\n";
$statistika = $videoteka->statistika();
echo "Ukupno filmova: " . $statistika['ukupno_filmova'] . "\n";
echo "Ukupno serija: " . $statistika['ukupno_serija'] . "\n";
echo "Prosječna ocjena: " . $statistika['prosjecna_ocjena'] . "\n";
echo "Ukupno korisnika: " . $statistika['ukupno_korisnika'] . "\n";

echo $korisnik->getIme() . " ima " . $korisnik->brojFilmovaNaListi() . " stavki na listi želja.\n";
