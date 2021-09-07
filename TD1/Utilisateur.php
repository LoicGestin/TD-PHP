<?php
   
class Utilisateur {
   
    private $login;
    private $nom;
    private $prenom;
   
   
    // un constructeur
    public function __construct($data) {
        $this->login = $data[0];
        $this->nom = $data[1];
        $this->prenom = $data[2];
    } 
              
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }

    public function set($nom_attribut) {
        $this->$nom_attribut = $m;
    }
}
?>

