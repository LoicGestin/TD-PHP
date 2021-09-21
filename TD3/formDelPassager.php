<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>

<body>


<form method="get" action="testDelPassager.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="id_trajet">id du trajet</label> :
            <input type="text" placeholder="1" name="trajet" id="id_trajet" required/>
        </p>
        <p>
            <label for="id_Utilisateur">ID de l'utilisateur</label> :
            <input type="text" placeholder="1" name="utilisateur" id="id_Utilisateur" required/>
        </p>


        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>

</form>
</body>
</html>
