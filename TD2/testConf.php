<?php

// On inclut les fichiers de classe PHP avec require_once
// pour éviter qu'ils soient inclus plusieurs fois
require_once 'Conf.php';

// On affiche le login de la base de donnees
echo Conf::getLogin();
echo Conf::getPassword();
echo Conf::getHostname();
echo Conf::getDatabase();

$database = Conf::getDatabase2();
echo $database['password'];
echo $database['login'];
echo $database['hostname'];
