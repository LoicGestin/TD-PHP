<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
</head>
<body>

    <?php
    // Si $controleur='voiture' et $view='list',
    // alors $filepath="/chemin_du_site/view/voiture/list.php"
    $filepath = File::build_path(array("view", static::$object, "$view.php"));
    require $filepath;
    echo "<br><a href=?action=readAll> Voulez vous retourner aux listes de voitures ? </a><br>";
    echo "<br><a href=?action=create> Voulez vous créer une voiture ? </a><br>";
    echo "<br><a href=?action=create&controller=utilisateur> Voulez vous créer un Utilisateur ? </a><br>";
    echo "<br><a href=?action=readAll&controller=utilisateur> Page d'acceuil </a><br>";
    echo "<br><a href=??action=readAll&controller=trajet> Tous les trajets </a>";
    ?>
    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
            Site de covoiturage de Loic Gestin aka el boss
        </p>


    </footer>
</body>
</html>

