
<?php

    foreach ($tab_u as $u)
        echo "<p>Utilisateur de Login : <a href=?action=read&controller=utilisateur&login=".rawurlencode($u->get("login")) .'>' . htmlspecialchars($u->get("login")) .
        "</a> Supprimer l'utilisateur ? <a href=?action=supp&controller=utilisateur&login=".rawurlencode($u->get("login")) . "> YES </a></p>";

?>