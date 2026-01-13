<?php
class Videoteka
{
    private $naziv;
    private $katalog = [];
    private $korisnici = [];

    public function __construct($naziv)
    {
        $this->naziv = $naziv;
    }


    public function dodajUKatalog($film)
    {
        if ($film instanceof Film) {
            $this->katalog[] = $film;
        }
    }


    public function registrirajKorisnika($korisnik)
    {
        if ($korisnik instanceof Korisnik) {
            $this->korisnici[] = $korisnik;
        }
    }

    public function pretraziPoZanru($zanr)
    {
        $rezultat = [];

        foreach ($this->katalog as $stavka) {
            if ($stavka->zanr === $zanr) {
                $rezultat[] = $stavka;
            }
        }

        return $rezultat;
    }

    public function najboljeOcijenjeni($n)
    {
        $sortirano = $this->katalog;

        usort($sortirano, function ($a, $b) {
            return $b->getOcjena() <=> $a->getOcjena();
        });

        return array_slice($sortirano, 0, $n);
    }

    public function statistika()
    {
        $ukupnoFilmova = 0;
        $ukupnoSerija = 0;
        $zbrojOcjena = 0;
        $brojOcjena = 0;

        foreach ($this->katalog as $stavka) {
            if ($stavka instanceof Serija) {
                $ukupnoSerija++;
            } else {
                $ukupnoFilmova++;
            }

            if ($stavka->getOcjena() !== null) {
                $zbrojOcjena += $stavka->getOcjena();
                $brojOcjena++;
            }
        }

        $prosjecnaOcjena = $brojOcjena > 0 ? $zbrojOcjena / $brojOcjena : 0;

        return [
            "ukupno_filmova" => $ukupnoFilmova,
            "ukupno_serija" => $ukupnoSerija,
            "ukupno_korisnika" => count($this->korisnici),
            "prosjecna_ocjena" => round($prosjecnaOcjena, 2)
        ];
    }
}
?>