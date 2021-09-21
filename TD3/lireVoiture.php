<?php
require_once 'Model.php';
require_once 'Voiture.php';
require_once '../TD1/Utilisateur.php';
require_once '../TD1/Trajet.php';

    /*
    $sql_request = "SELECT * FROM voiture";
    $rep = Model::getPdo()->query($sql_request);
    /*
    $tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);

    var_dump($tab_obj);
    foreach ($tab_obj  as $key => $value) {
        //print "$key => $value\n";
        echo "<li> ";
        foreach ($value as $key => $oui) {

            echo " $oui ";

        }
        echo "   </li>";
    }

    $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $tab_voit = $rep->fetchAll();
    $num = 0;
    */
    $tab_voit = Voiture::getAllVoitures();
    $num = 0;
    foreach ($tab_voit  as $key => $value) {
        $num += 1;
        echo "<h2>Voiture n°$num </h2><br>";
        $value->afficher();
        echo "<br>";
    }

    $tab_voit = Utilisateur::getAllUtilisateurs();
    $num = 0;
    foreach ($tab_voit  as $key => $value) {
        $num += 1;
        echo "<h2>Utilisateur n°$num </h2><br>";
        $value->afficher();
        echo "<br>";
    }

    $tab_voit = Trajet::getAllTrajets();
    $num = 0;
    foreach ($tab_voit  as $key => $value) {
        $num += 1;
        echo "<h2>Trajet n°$num </h2><br>";
        $value->afficher();
        echo "<br>";
    }

    $tab_voit = Voiture::getVoitureByImmat("0707068A");
    echo "<h1> TD3  voiture immat 0707068A</h1><br>";
    $tab_voit->afficher();

    $Voiture1 = new Voiture("teslaX","vert","ABC123");
    $Voiture1->save();




