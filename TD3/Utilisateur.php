<?php
require_once 'Trajet.php';
class Utilisateur {
   
    private $login;
    private $nom;
    private $prenom;
   
   
    // un constructeur
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->login = $m;
            $this->nom = $c;
            $this->prenom = $i;
        }
    }
    public static function getAllUtilisateurs(){

        $sql_request = "SELECT * FROM utilisateur";
        try {
            $rep = Model::getPdo()->query($sql_request);
            $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
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
    public function __construct2($data) {
        $this->login = $data[0];
        $this->nom = $data[1];
        $this->prenom = $data[2];
    } 
              
    public function get($nom_attribut) {
        return $this->$nom_attribut;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public static function findTrajets($login){
        $sql = "SELECT * FROM trajet t 
                        JOIN passager p ON p.trajet_id= t.id
                        WHERE p.utilisateur_login =:nom_tag";

        $req_prep = Model::getPDO()->prepare($sql);

        $values = array(
            "nom_tag" => $login,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);

        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
        $tab_trajet = $req_prep->fetchAll();

        return $tab_trajet;

    }


    public function afficher() {
        echo " <h5>login= $this->login <br> nom = $this->nom <br> prenom = $this->prenom</h5>";
    }

}
?>

