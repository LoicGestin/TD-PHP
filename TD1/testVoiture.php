<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        
        <?php
        require_once "Voiture.php";
        $Voiture1 = new Voiture("Toyota","Rouge","07045");
        $Voiture1->afficher();

        
    
    ?>
    </body>
</html> 