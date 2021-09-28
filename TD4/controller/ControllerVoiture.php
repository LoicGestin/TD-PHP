<?php
require_once ('../model/ModelVoiture.php'); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require ('../view/voiture/list.php');  //"redirige" vers la vue
    }
    public static function read($immat){
        $v = ModelVoiture::getVoitureByImmat($immat);
        require ('../view/voiture/detail.php');
    }
    public static function create(){
        require ('../view/voiture/create.php');
    }
    public static function created($marque, $imma, $couleur){
        $v = new ModelVoiture($marque,$couleur,$imma);
        $v->save();
        self::readAll();
    }
    public static function supp($imma){
        ModelVoiture::supp($imma);
        self::readAll();
    }
}
?>
