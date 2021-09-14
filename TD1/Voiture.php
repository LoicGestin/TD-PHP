<?php
   
class Voiture {
   
    private $marque;
    private $couleur;
    private $immatriculation;

    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }
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
   
   public static function getAllVoitures(){

       $sql_request = "SELECT * FROM voiture";
       try {
           $rep = Model::getPdo()->query($sql_request);
           $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
           $tab_voit = $rep->fetchAll();
       }
       catch (PDOException $e) {
           if (Conf::getDebug()) {
               echo $e->getMessage(); // affiche un message d'erreur
           } else {
               echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
           }
           die();
       }

       return $tab_voit;
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
    public function __construct2($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    } 
              
    // une methode d'affichage.
    public function afficher() {
        echo " <h5>Marque = $this->marque <br> Immatriculation = $this->immatriculation <br> Couleur = $this->couleur</h5>";
    }
}
?>

