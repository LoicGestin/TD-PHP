<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>

<body>


<form method="get" >
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
        </p>
        <p>
            <label for="marque_id">Marque</label> :
            <input type="text" placeholder="Tesla" name="Marque" id="marque_id" required/>
        </p>
        <p>
            <label for="couleur_id">Couleur</label> :
            <input type="text" placeholder="Rouge" name="Couleur" id="couleur_id" required/>
        </p>
            <input type='hidden' name='action' value='created'>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
    <?php
        echo "<a href=?action=readAll> Voulez vous retourner aux listes de voitures ? </a>";
    ?>
    </bod
</form>
</body>
</html>