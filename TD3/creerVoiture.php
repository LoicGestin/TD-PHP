<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        
        <?php
        require_once 'Voiture.php';
        require_once 'Model.php';
        echo "Voiture $_POST[immatriculation]  de marque   $_POST[Marque] (couleur  $_POST[Couleur] )";
        $imma = $_POST['immatriculation'] ;
        $marq = $_POST['Marque'] ;
        $coul = $_POST['Couleur'];
        echo $marq;
        $Voiture1 = new Voiture($marq,$imma,$coul);
        $Voiture1->save();
        
        
        
    
    ?>
    </body>
</html> 