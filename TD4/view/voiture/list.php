
<?php

        foreach ($tab_v as $v)
        echo "<p> Voiture d\'immatriculation <a href=?action=read&immat=".rawurlencode($v->getImmatriculation()) .'>' . htmlspecialchars($v->getImmatriculation()) . "</a>
                Supprimer la voiture ? <a href=?action=supp&immatri=".rawurlencode($v->getImmatriculation()) . "> YES </a></p>" ;



?>
