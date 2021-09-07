<?php
   
class Voiture {
   
    private $marque;
    private $couleur;
    private $immatriculation;
   
    // un getter      
    public function getMarque() {
        return $this->marque;
    }

    public function getCouleur() {
        return $this->couleur;
    }
   

    public function getImmatriculation() {
        return $this->immatriculation;
    }
   
   
    // un setter 
    public function setMarque($m) {
        $this->marque = $m;
    }
    public function setCouleur($m) {
        $this->couleur = $m;
    }
    public function setImmatriculation($m) {
        if (strlen($m) <= 8){
            $this->immatriculation = $m;
        }
    }
   
    // un constructeur
    public function __construct($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    } 
              
    // une methode d'affichage.
    public function afficher() {
        echo " Marque = $this->marque , Immatriculation = $this->immatriculation , Couleur = $this->couleur";
    }
}
?>

