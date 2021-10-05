<?php
require_once File::build_path(array("model","ModelUtilisateur.php")); // chargement du modèle
class ControllerUtilisateur
{
    public static function readAll()
    {
        $tab_u = ModelUtilisateur::getAllUtilisateurs();
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';//appel au modèle pour gerer la BD
        require File::build_path(array("view", "view.php"));  //"redirige" vers la vue
    }


}