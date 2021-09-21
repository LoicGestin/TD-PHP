<?php
require_once 'Model.php';
require_once 'Utilisateur.php';
require_once 'Trajet.php';

$tab_user = Trajet::findPassagers($_GET['trajet'] );
$num = 0;
foreach ($tab_user  as $key => $value) {
    $value->afficher();
}
