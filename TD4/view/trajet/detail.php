<?php
if ($t == false){
    require (File::build_path(array("view","trajet","error.php")));
}
else {
    echo "<p>Depart de  " . htmlspecialchars($t->get("depart"))  ." à ". htmlspecialchars($t->get("arivee")) . " à la date " . htmlspecialchars($t->get("date")) . ", il y'a " .
        htmlspecialchars($t->get("nbplaces")) . " place, et le prix du trajet est de  " . htmlspecialchars($t->get("prix"))
        ."€, le conducteur est :  "
         . "L'utilisateur de Login : <a href=?action=read&controller=utilisateur&login=".rawurlencode($t->get("conducteur_login")) .'>' . htmlspecialchars($t->get("conducteur_login")) . "</a><br></p>";

    echo " <br>Supprimer le trajet ? <a href=?action=supp&controller=trajet&id=".rawurlencode($t->get("id")) . "> YES </a></p>" ;
    echo " <br>Mettre à jour le trajet ? <a href=?action=update&controller=trajet&id=".rawurlencode($t->get("id")) . "> YES </a></p>" ;
}
?>
