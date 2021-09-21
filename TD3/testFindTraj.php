<?php

require_once 'Model.php';
require_once 'Utilisateur.php';
require_once 'Trajet.php';
$tab_trajet = Utilisateur::findTrajets($_GET['utilisateur']);
$num = 0;
foreach ($tab_trajet as $key => $value) {
    $value->afficher();
}
