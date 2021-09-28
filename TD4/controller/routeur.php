<?php
    require_once 'ControllerVoiture.php';
    // On recupère l'action passée dans l'URL

    //$created = $_GET['create'];
        if(sizeof($_GET) == 0){
            ControllerVoiture::create();
        }
        else {
            $action = $_GET['action'];

            if ($action == "read") {
                $immat = $_GET['immat']; // $_GET['immat'];
                ControllerVoiture::$action($immat);
            }
            elseif ($action == "created"){
                ControllerVoiture::$action($_GET['Marque'], $_GET['immatriculation'], $_GET['Couleur']);
            }
            elseif ($action == "supp"){
                ControllerVoiture::$action($_GET['immatri']);
            }
            else {
                ControllerVoiture::$action();
            }
        }




    /*
        if($_GET['immat'] == null){
            ControllerVoiture::readAll();
        }
    */





?>
