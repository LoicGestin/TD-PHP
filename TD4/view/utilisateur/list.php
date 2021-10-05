
<?php

    foreach ($tab_u as $u)
        echo "L'utilisateur ". $u->get("prenom") . " " . $u->get("nom") . " a comme login ". $u->get("login") . "<br>";

?>