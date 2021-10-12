<?php
require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle
class ControllerUtilisateur
{
    protected static $object = 'utilisateur';
    public static function readAll()
    {
        $tab_u = ModelUtilisateur::selectAll();
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';//appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }
    public static function read(){
        $u = ModelUtilisateur::select($_GET['login']);
        $view='detail';
        $pagetitle='Détail des utilisateurs';
        require File::build_path(array("view","view.php"));
    }

    public static function supp(){
        ModelUtilisateur::delete($_GET['login']);
        $view='deleted';
        $pagetitle='Utilisateur Supprimé ! ';
        $login = $_GET['login'];
        $tab_u = ModelUtilisateur::selectAll();

        require File::build_path(array("view","view.php"));
    }
    public static function create(){
        $view='update';
        $act = "create";
        $pagetitle='Creation Utilisateur';
        $login = "";
        $prenom = "";
        $nom = "";
        require File::build_path(array("view","view.php"));
    }

    public static function update(){
        $view='update';
        $act = "update";
        $pagetitle='Update Utilisateur';
        $u = ModelUtilisateur::select($_GET['login']);
        $login = $u->get("login");
        $prenom = $u->get("prenom");
        $nom = $u->get("nom");

        require File::build_path(array("view","view.php"));
    }

    public static function created(){
        $view='created';
        $pagetitle='Utilisateur crée';
        $data['prenom'] = $_GET['prenom'];
        $data['nom'] = $_GET['nom'];
        $data['login'] = $_GET['login'];

        ModelUtilisateur::create($data);

        $tab_u = ModelUtilisateur::selectAll();

        require File::build_path(array("view","view.php"));
    }
    public static function updated(){
        $view='updated';


        $data['prenom'] = $_GET['prenom'];
        $data['nom'] = $_GET['nom'];
        $data['login'] = $_GET['login'];

        ModelUtilisateur::update($data);

        $pagetitle='Utilisateur update';

        $tab_u = ModelUtilisateur::selectAll();
        require File::build_path(array("view","view.php"));
    }
}