<?php
class Serija extends Film {
    private $brojSezona;
    private $brojEpizoda;

    public function __construct($naziv, $godina, $zanr, $brojSezona, $brojEpizoda) {
        parent::__construct($naziv, $godina, $zanr);
        $this->brojSezona = $brojSezona;
        $this->brojEpizoda = $brojEpizoda;
    }

    public function getInfo() {
        return parent::getInfo() . ", Broj sezona: " . $this->brojSezona . ", Broj epizoda: " . $this->brojEpizoda;
    }
}
?>