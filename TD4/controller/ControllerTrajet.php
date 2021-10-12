<?php

require_once File::build_path(array("model","ModelTrajet.php")); // chargement du modèle
class ControllerTrajet
{
    protected static $object = 'trajet';
    public static function readAll()
    {
        $tab_t = ModelTrajet::selectAll();
        $view = 'list';
        $pagetitle = 'Liste des trajets';//appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }
    public static function read(){
        $t = ModelTrajet::select($_GET['id']);
        $view='detail';
        $pagetitle='Détail Trajet';
        require File::build_path(array("view","view.php"));
    }
    public static function supp(){
        ModelTrajet::delete($_GET['id']);
        $view='deleted';
        $pagetitle='Trajet Supprimé ! ';
        $id = $_GET['id'];
        $tab_t = ModelTrajet::selectAll();
        require File::build_path(array("view","view.php"));
    }
    public static function create(){
        $view='update';
        $act = "create";
        $pagetitle='Creation Trajet';
        $id="";
        $depart="";
        $arivee="";
        $date="";
        $nbplaces="";
        $prix="";
        $conducteur_login="";
        $tab_u = ModelUtilisateur::selectAll();

        require File::build_path(array("view","view.php"));
    }
    public static function update(){
        $view='update';
        $act = "update";
        $pagetitle='Update Trajet';

        $t = ModelTrajet::select($_GET['id']);
        $id = $t->get("id");
        $depart = $t->get("depart");
        $arivee = $t->get("arivee");
        $date = $t->get("date");
        $nbplaces = $t->get("nbplaces");
        $prix = $t->get("prix");
        $conducteur_login = $t->get("conducteur_login");
        $tab_u = ModelUtilisateur::selectAll();
        require File::build_path(array("view","view.php"));
    }
    public static function updated(){
        $data['id'] = $_GET['id'];
        $data['depart'] = $_GET['depart'];
        $data['arivee'] = $_GET['arivee'];
        $data['date'] = $_GET['date'];
        $data['nbplaces'] = $_GET['nbplaces'];
        $data['prix'] = $_GET['prix'];
        $data['conducteur_login'] = $_GET['conducteur_login'];
        ModelTrajet::update($data);

        $view='updated';
        $pagetitle='Trajet créée';
        $tab_t = ModelTrajet::selectAll();
        require File::build_path(array("view","view.php"));
    }
    public static function created(){
        $view='created';

        $data['id'] = null;
        $data['depart'] = $_GET['depart'];
        $data['arivee'] = $_GET['arivee'];
        $data['date'] = $_GET['date'];
        $data['nbplaces'] = $_GET['nbplaces'];
        $data['prix'] = $_GET['prix'];
        $data['conducteur_login'] = $_GET['conducteur_login'];

        $pagetitle='Trajet crée';
        ModelTrajet::create($data);
        $tab_t = ModelTrajet::selectAll();


        require File::build_path(array("view","view.php"));
    }

}