<?php
    $login2 = htmlspecialchars($login);
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
            <label for="login_id">Login</label> :
            <?php echo "<input type='text' value='$login2' $tag name='login' id='login_id' required/>" ?>
        </p>
        <p>
            <label for="nom_id">Nom</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($nom) ."'name='nom' id='nom_id' required/>" ?>
        </p>
        <p>
            <label for="prenom_id">Prenom</label> :
            <?php echo "<input type='text' value='".htmlspecialchars($prenom)."'name='prenom' id='prenom_id' required/>" ?>
        </p>
        <?php echo "<input type='hidden' name='action' value=$tag2>"?>
        <?php echo "<input type='hidden' name='controller' value='utilisateur'>"?>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
