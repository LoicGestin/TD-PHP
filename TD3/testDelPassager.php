<?php


require_once 'Model.php';
require_once 'Utilisateur.php';
require_once 'Trajet.php';

$data['trajet_id'] = $_GET['trajet'];
$data['utilisateur_login'] = $_GET['utilisateur'];
Trajet::deletePassager($data);

