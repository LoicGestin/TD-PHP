<?php
    $immat2 = htmlspecialchars($immatriculation);
    $tag = "readonly";
    $tag2 = "updated";
    $controller = static::$object;
    if($act == "create"){
        $tag = "required";
        $tag2 = "created";
    }

?>
<form method="get" >
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <?php echo "<input type='text' value='$immat2' $tag name='immatriculation' id='immat_id' required/>" ?>
        </p>
        <p>
            <label for="marque_id">Marque</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($marque) ."'name='Marque' id='marque_id' required/>" ?>
        </p>
        <p>
            <label for="couleur_id">Couleur</label> :
             <?php echo "<input type='text' value='".htmlspecialchars($couleur)."'name='Couleur' id='couleur_id' required/>" ?>
        </p>
            <?php echo "<input type='hidden' name='action' value=$tag2>"?>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
