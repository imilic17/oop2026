<?php
class Korisnik {
    private $ime;
    private $email;
    private $listaZelja = [];

    public function __construct($ime, $email, $listaZelja = []) {
        $this->ime = $ime;
        $this->email = $email;
        $this->listaZelja = [];
    }

    public function getIme() : mixed {
        return $this->ime;
    }
    public function getEmail() : mixed {
        return $this->email;
    }

    public function dodajNaListuZelja($stavka) {
        $this->listaZelja[] = $stavka;
    }

    public function ukloniSaListeZelja($stavka) {
        $index = array_search($stavka, $this->listaZelja);
        if ($index !== false) {
            unset($this->listaZelja[$index]);
            $this->listaZelja = array_values($this->listaZelja);
        }
    }

    public function prikaziListuZelja() {
        return $this->listaZelja;
    }

    public function brojFilmovaNaListi() {
        return count($this->listaZelja);
    }
}
?>
