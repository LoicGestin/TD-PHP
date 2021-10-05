<?php
require_once File::build_path(array("model","ModelVoiture.php")); // chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();
        $controller='voiture';
        $view='list';
        $pagetitle='Liste des voitures';//appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }
    public static function read($immat){
        $v = ModelVoiture::getVoitureByImmat($immat);
        $controller='voiture';
        $view='detail';
        $pagetitle='Détail de la voiture';
        require File::build_path(array("view","view.php"));
    }
    public static function create(){
        $controller='voiture';
        $view='create';
        $pagetitle='Creation Voiture';
        require File::build_path(array("view","view.php"));
    }
    public static function created($marque, $imma, $couleur){
        $v = new ModelVoiture($marque,$couleur,$imma);
        $v->save();
        $controller='voiture';
        $view='created';
        $pagetitle='Voiture créée';
        $tab_v = ModelVoiture::getAllVoitures();
        require File::build_path(array("view","view.php"));
    }
    public static function supp($imma){
        ModelVoiture::deleteByImmat($imma);
        $controller='voiture';
        $view='deleted';
        $pagetitle='Voiture Supprimé ! ';

        $immat = $imma;
        $tab_v = ModelVoiture::getAllVoitures();

        require File::build_path(array("view","view.php"));

    }
    public static function error(){
        $controller='voiture';
        $view='error';
        $pagetitle='ERREUR';
        require File::build_path(array("view","view.php"));
    }
}
?>
