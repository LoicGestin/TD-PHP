<?php
require_once File::build_path(array("model","Model.php"));
class ModelVoiture{
   
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
           $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
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
    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $immat,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }
    public function save(){
        $sql_request = "INSERT INTO voiture (immatriculation, marque, couleur) VALUES ('$this->immatriculation','$this->marque','$this->couleur')";
        try {

            Model::getPdo()->query($sql_request);

        }
        catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }
    public static function updated($data){
        $sql_request = "UPDATE voiture
                        SET marque =:nom_marque,
                            couleur =:nom_couleur
                        WHERE immatriculation =:nom_imma";
        try {
            $req_prep = Model::getPDO()->prepare($sql_request);

            $values = array(
                "nom_marque" => $data['marque'],
                "nom_couleur" => $data['couleur'],
                "nom_imma" => $data['immatriculation'],
                //nomdutag => valeur, ...
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        }
        catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

    }
    public static function deleteByImmat($imma){
        $sql_request = "DELETE FROM voiture WHERE immatriculation=:nom_tag;";
        try {
            $req_prep = Model::getPDO()->prepare($sql_request);

            $values = array(
                "nom_tag" => $imma,
                //nomdutag => valeur, ...
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        }
        catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

    }
    // un constructeur
    public function __construct2($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    }
    /*
              
    // une methode d'affichage.
    public function afficher() {
        echo " <h5>Marque = $this->marque <br> Immatriculation = $this->immatriculation <br> Couleur = $this->couleur</h5>";
    }
    */
}
?>

