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
    public static function read(){
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
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
    public static function created(){
        $v = new ModelVoiture($_GET['Marque'],$_GET['Couleur'],$_GET['immatriculation']);
        $v->save();
        $controller='voiture';
        $view='created';
        $pagetitle='Voiture créée';
        $tab_v = ModelVoiture::getAllVoitures();
        require File::build_path(array("view","view.php"));
    }
    public static function supp(){
        ModelVoiture::deleteByImmat($_GET['immatri']);
        $controller='voiture';
        $view='deleted';
        $pagetitle='Voiture Supprimé ! ';

        $immat = $_GET['immatri'];
        $tab_v = ModelVoiture::getAllVoitures();

        require File::build_path(array("view","view.php"));
    }
    public static function error(){
        $controller='voiture';
        $view='error';
        $pagetitle='ERREUR';
        require File::build_path(array("view","view.php"));
    }

    public static function update(){
        $controller='voiture';
        $view='update';
        $pagetitle='UPDATE VOITURE';
        $immat = $_GET['immatri'];
        require File::build_path(array("view","view.php"));
    }
    public static function updated(){
        $data['marque'] = $_GET['Marque'];
        $data['immatriculation'] = $_GET['immatriculation'];
        $data['couleur'] = $_GET['Couleur'];
        ModelVoiture::updated($data);

        $controller='voiture';
        $view='updated';
        $pagetitle='Voiture créée';

        $tab_v = ModelVoiture::getAllVoitures();
        require File::build_path(array("view","view.php"));
    }
}
?>
