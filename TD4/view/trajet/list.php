<?php
foreach ($tab_t as $t)

    echo "<p>Trajet de ID : <a href=?action=read&controller=trajet&id=" . rawurlencode($t->get("id")) . '>' . htmlspecialchars($t->get("id")) .
        "</a> Supprimer le trajet ? <a href=?action=supp&controller=trajet&id=" . rawurlencode($t->get("id")) . "> YES </a></p>";

?>