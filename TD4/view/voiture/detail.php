<?php

    if ($v == false){
        require (File::build_path(array("view","voiture","error.php")));
    }
    else {
        echo "Voiture " . htmlspecialchars($v->getCouleur()) . " de marque " . htmlspecialchars($v->getMarque()) . " d'immatriculation " . htmlspecialchars($v->getImmatriculation());
        echo " <br>Supprimer la voiture ? <a href=?action=supp&immatri=".rawurlencode($v->getImmatriculation()) . "> YES </a></p>" ;
        echo " <br>Mettre à jour la voiture? <a href=?action=update&immatri=".rawurlencode($v->getImmatriculation()) . "> YES </a></p>" ;
    }
?>
