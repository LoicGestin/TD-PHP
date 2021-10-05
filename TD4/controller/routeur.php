<?php

    require_once 'ControllerVoiture.php';
    require_once 'ControllerUtilisateur.php';
    // On recupère l'action passée dans l'URL

    //$created = $_GET['create'];
        $controller = "voiture";
        $action = "readAll";
        if(isset($_GET['controller'])){
            $controller = $_GET['controller'];
        }
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        $controller_class = "Controller".ucfirst($controller);
        $list_methode = get_class_methods($controller_class);

        if (in_array($action,$list_methode)) {
            $controller_class::$action();
        }
        else{
                $controller_class::error();
        }
?>
