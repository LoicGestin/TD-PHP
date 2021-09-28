<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php

        foreach ($tab_v as $v)
        echo "<p> Voiture d\'immatriculation <a href=?action=read&immat=".$v->getImmatriculation() .'>' . $v->getImmatriculation() . "</a>
                Supprimer la voiture ? <a href=?action=supp&immatri=".$v->getImmatriculation() . "> YES </a></p>" ;
        echo "<br><a href=?action=create> Voulez vous créer une voiture ? </a><br>";


?>
</body>
</html>
