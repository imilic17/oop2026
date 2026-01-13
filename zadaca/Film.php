<?php
class Film {
    public $naziv;
    public $godina;
    public $zanr;
    private $ocjena;

    public function __construct($naziv,$godina,$zanr){
        $this->naziv = $naziv;
        $this->godina = $godina;
        $this->zanr = $zanr;
    }
    public function setOcjena($ocjena){
        if ($ocjena >= 1 && $ocjena <= 10) {
            $this->ocjena = $ocjena;
        } else {
            echo "Ocjena mora biti između 1 i 10.";
        }
    }
    public function getOcjena(){
        return $this->ocjena;
    }

    public function getInfo(){
        return "Film: " . $this->naziv . " (" . $this->godina . "), Žanr: " . $this->zanr . ", Ocjena: " . $this->ocjena;
    }
}
?>