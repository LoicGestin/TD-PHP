<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        
        <?php
        echo "Voiture $_POST[immatriculation]  de marque   $_POST[Marque] (couleur  $_POST[Couleur] )";
        $Voiture1 = new Voiture($_POST[Marque] ,$_POST[immatriculation],$_POST[Couleur]);
        
        
        
    
    ?>
    </body>
</html> 