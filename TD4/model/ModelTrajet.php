<?php

require_once File::build_path(array("model","Model.php"));
class ModelTrajet extends Model
{
    private $id;
    private $depart;
    private $arivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;
    protected static $primary='id';
    protected static $object = "trajet";



    // un constructeur
    public function __construct($a = NULL, $b = NULL, $c = NULL,$d = NULL, $e = NULL, $f = NULL, $g = NULL) {
        if (!is_null($a) && !is_null($b) && !is_null($c) && !is_null($d) && !is_null($e) && !is_null($f) && !is_null($g)) {
            // Si aucun de $a, $b et $c ... sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->id = $a;
            $this->depart = $b;
            $this->arivee = $c;
            $this->date = $d;
            $this->nbplaces = $e;
            $this->prix = $f;
            $this->conducteur_login = $g;
        }
    }
    public function __construct2($data) {
        $this->id = $data[0];
        $this->depart = $data[1];
        $this->arivee = $data[2];
        $this->date = $data[3];
        $this->nbplaces = $data[4];
        $this->prix = $data[5];
        $this->conducteur_login = $data[6];
    }

    public static function getAllTrajets(){

        $sql_request = "SELECT * FROM trajet";
        try {
            $rep = Model::getPdo()->query($sql_request);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
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
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }
    public static function findPassagers($id){
        $sql = "SELECT * FROM utilisateur t 
                        JOIN passager p ON p.utilisateur_login = t.login
                        
                        WHERE p.trajet_id = :nom_tag";

        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $id,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $tab_user = $req_prep->fetchAll();

        return $tab_user;

    }
    public static function deletePassager($data){
        $sql_request = "DELETE FROM passager
                        WHERE trajet_id = '$data[trajet_id]' AND utilisateur_login = '$data[utilisateur_login]'";
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
    public function set($nom_attribut) {
        $this->$nom_attribut = $nom_attribut;
    }
    // une methode d'affichage.
    public function afficher() {
        echo " <h5>id= $this->id <br> depart = $this->depart <br> arrivee = $this->arivee <br>
                date = $this->date <br> nbplaces = $this->nbplaces <br> prix = $this->prix <br> conducteur_login = $this->conducteur_login</h5>";
    }
}
?>

