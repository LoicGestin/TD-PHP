<?php
if ($u == false){
    require (File::build_path(array("view","utilisateur","error.php")));
}
else {
    echo "<p>Utilisateur " . htmlspecialchars($u->get("nom"))  ." ". htmlspecialchars($u->get("prenom")) . " de login " . htmlspecialchars($u->get("login")) . "<br></p>";
    echo " <br>Supprimer l'utilisateur ? <a href=?action=supp&controller=utilisateur&login=".rawurlencode($u->get("login")) . "> YES </a></p>" ;
    echo " <br>Mettre à jour l'utilisateur ? <a href=?action=update&controller=utilisateur&login=".rawurlencode($u->get("login")) . "> YES </a></p>" ;
}
?>
