<?php
$id2 = htmlspecialchars($id);
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
            <label for="trajet_id">ID du Trajet</label> :
            <?php echo "<input type='text' value='$id2' readonly name='id' id='trajet_id' required/>" ?>
        </p>
        <p>
            <label for="depart_id">Depart</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($depart) ."'name='depart' id='depart_id' required/>" ?>
        </p>
        <p>
            <label for="arivee_id">Arivee</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($arivee) ."'name='arivee' id='arivee_id' required/>" ?>
        </p>
        <p>
            <label for="date_id">Date</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($date) ."'name='date' id='date_id' required/>" ?>
        </p>
        <p>
            <label for="nbplaces_id">NbPlaces</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($nbplaces) ."'name='nbplaces' id='nbplaces_id' required/>" ?>
        </p>
        <p>
            <label for="prix_id">Prix</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($prix) ."'name='prix' id='prix_id' required/>" ?>
        </p>
        <p>
            <label for="conducteur_id">Conducteur login</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($conducteur_login)."'name='conducteur_login' id='conducteur_id' required/>" ?>
        </p>
        <?php echo "<input type='hidden' name='action' value=$tag2>"?>
        <?php echo "<input type='hidden' name='controller' value='trajet'>"?>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
