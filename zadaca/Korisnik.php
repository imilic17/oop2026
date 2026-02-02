<?php

class Korisnik {
    private string $ime;
    private string $email;
    private array $listaZelja;

    public function __construct(string $ime, string $email, array $listaZelja = []) {
        $this->ime = $ime;
        $this->email = $email;
        $this->listaZelja = $listaZelja; 
    }

    public function getIme(): string {
        return $this->ime;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function dodajNaListuZelja(mixed $stavka): void {
        $this->listaZelja[] = $stavka;
    }

    public function ukloniSaListeZelja(mixed $stavka): void {
        $index = array_search($stavka, $this->listaZelja, true);
        if ($index !== false) {
            unset($this->listaZelja[$index]);
            $this->listaZelja = array_values($this->listaZelja);
        }
    }

    public function prikaziListuZelja(): array {
        return $this->listaZelja;
    }

    public function brojFilmovaNaListi(): int {
        return count($this->listaZelja);
    }
}
