<?php

    require_once 'ControllerVoiture.php';
    // On recupère l'action passée dans l'URL

    //$created = $_GET['create'];
        $controller = "voiture";
        if(isset($_GET['controller'])){
            $controller = $_GET['controller'];
        }
        if(!isset($_GET['action'])){ // ou size($_GET) > 0
            $action = "readAll";
            ControllerVoiture::$action();
        }
        else {
            $controller_class = "Controller".ucfirst($controller);
            $list_methode = get_class_methods($controller_class);

            $action = $_GET['action'];

            if (in_array($action,$list_methode)) {
                if ($action == "read") {
                    $immat = $_GET['immat']; // $_GET['immat'];
                    $controller_class::$action($immat);
                } elseif ($action == "created" || $action == "updated") {
                    $controller_class::$action($_GET['Marque'], $_GET['immatriculation'], $_GET['Couleur']);
                } elseif ($action == "supp" || $action == "update") {
                    $controller_class::$action($_GET['immatri']);
                } else {
                    $controller_class::$action();
                }
            }
            else{
                $controller_class::error();
            }
        }




    /*
        if($_GET['immat'] == null){
            ControllerVoiture::readAll();
        }
    */





?>
