<?php
require_once File::build_path(array("model","ModelVoiture.php")); // chargement du modèle
class ControllerVoiture {

    protected static $object = 'voiture';

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();
        $view='list';
        $pagetitle='Liste des voitures';//appel au modèle pour gerer la BD
        require File::build_path(array("view","view.php"));  //"redirige" vers la vue
    }
    public static function read(){
        $v = ModelVoiture::select($_GET['immat']);
        $view='detail';
        $pagetitle='Détail de la voiture';
        require File::build_path(array("view","view.php"));
    }
    public static function create(){
        $view='update';
        $pagetitle='Creation Voiture';
        $marque = "";
        $immatriculation = "";
        $couleur = "";
        $act = "create";
        require File::build_path(array("view","view.php"));
    }
    public static function created(){
        $v = new ModelVoiture($_GET['Marque'],$_GET['Couleur'],$_GET['immatriculation']);
        $v->save();
        $view='created';
        $pagetitle='Voiture créée';
        $tab_v = ModelVoiture::selectAll();
        require File::build_path(array("view","view.php"));
    }
    public static function supp(){
        ModelVoiture::delete($_GET['immatri']);
        $view='deleted';
        $pagetitle='Voiture Supprimé ! ';

        $immat = $_GET['immatri'];
        $tab_v = ModelVoiture::selectAll();

        require File::build_path(array("view","view.php"));
    }
    public static function error(){
        $view='error';
        $pagetitle='ERREUR';
        require File::build_path(array("view","view.php"));
    }

    public static function update(){
        $view='update';
        $pagetitle='UPDATE VOITURE';
        $act = "update";
        $voit = ModelVoiture::select($_GET['immatri']);
        $marque = $voit->getMarque();
        $immatriculation = $voit->getImmatriculation();
        $couleur = $voit->getCouleur();
        require File::build_path(array("view","view.php"));
    }
    public static function updated(){
        $data['marque'] = $_GET['Marque'];
        $data['immatriculation'] = $_GET['immatriculation'];
        $data['couleur'] = $_GET['Couleur'];

        ModelVoiture::update($data);

        $view='updated';
        $pagetitle='Voiture créée';

        $tab_v = ModelVoiture::selectAll();
        require File::build_path(array("view","view.php"));
    }
}
?>
