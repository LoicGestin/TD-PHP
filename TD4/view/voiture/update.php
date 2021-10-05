<?php
    $voit = ModelVoiture::getVoitureByImmat($immat);
    var_dump($voit);
    $immat2 = htmlspecialchars($immat);
    echo $voit->getMarque();

?>
<form method="get" >
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <?php echo "<input type='text' value='$immat2' readonly name='immatriculation' id='immat_id' required/>" ?>
        </p>
        <p>
            <label for="marque_id">Marque</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($voit->getMarque()) ."'name='Marque' id='marque_id' required/>" ?>
        </p>
        <p>
            <label for="couleur_id">Couleur</label> :
             <?php echo "<input type='text' value='".htmlspecialchars($voit->getCouleur())."'name='Couleur' id='couleur_id' required/>" ?>
        </p>
            <input type='hidden' name='action' value='updated'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
