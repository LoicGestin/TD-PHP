<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php

    if ($v == false){
        require ('error.php');
    }
    else {
        echo "Voiture " . $v->getCouleur() . " de marque " . $v->getMarque() . " d'immatriculation " . $v->getImmatriculation();
        echo "<br><a href=?action=create> Voulez vous créer une voiture ? </a><br>";
        echo "<a href=?action=readAll> Voulez vous retourner aux listes de voitures ? </a>";
    }
?>
</body>
</html>