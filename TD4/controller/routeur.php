<?php

    require_once 'ControllerVoiture.php';
    // On recupère l'action passée dans l'URL

    //$created = $_GET['create'];
        if(!isset($_GET['action'])){ // ou size($_GET) > 0
            $action = "readAll";
            ControllerVoiture::$action();
        }
        else {
            $list_methode = get_class_methods('ControllerVoiture');

            $action = $_GET['action'];
            if (in_array($action,$list_methode)) {
                if ($action == "read") {
                    $immat = $_GET['immat']; // $_GET['immat'];
                    ControllerVoiture::$action($immat);
                } elseif ($action == "created") {
                    ControllerVoiture::$action($_GET['Marque'], $_GET['immatriculation'], $_GET['Couleur']);
                } elseif ($action == "supp") {
                    ControllerVoiture::$action($_GET['immatri']);
                } else {
                    ControllerVoiture::$action();
                }
            }
            else{
                ControllerVoiture::error();
            }
        }




    /*
        if($_GET['immat'] == null){
            ControllerVoiture::readAll();
        }
    */





?>
