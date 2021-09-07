<?php
   
class Utilisateur {
   
    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;
    
   
   
    // un constructeur
    public function __construct($data) {
        $this->id = $data[0];
        $this->depart = $data[1];
        $this->arrivee = $data[2];
        $this->date = $data[3];
        $this->nbplaces = $data[4];
        $this->prix = $data[5];
        $this->conducteur_login = $data[6];
    } 
              
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }

    public function set($nom_attribut) {
        $this->$nom_attribut = $m;
    }
}
?>

