<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        Voici le résultat du script PHP : 
        <?php
          // Ceci est un commentaire PHP sur une ligne
          /* Ceci est le 2ème type de commentaire PHP
          sur plusieurs lignes */
           
          // On met la chaine de caractères "hello" dans la variable 'texte'
          // Les noms de variable commencent par $ en PHP
          $texte = "hello world !";

          // On écrit le contenu de la variable 'texte' dans la page Web
          echo $texte;

          $prenom="Helmut";
        
          echo " \n Bonjour $prenom,\n ça farte ?";
          echo " Bonjour " . 'bg';

echo <<< END
Texte à afficher
sur plusieurs lignes
avec caractères spéciaux \t \n
et remplacement de variables $prenom
les caractères suivants passent : " ' $ / \ ;
END;

        var_dump($prenom);


        $mon_tableau = array();
        $mon_tableau[] = "Arouf";
        $mon_tableau[] = "Gangsta";


        $coordonnees['prenom'] = 'François';
        $coordonnees['nom'] = 'Dupont';

        // $coordonnees = array (
        //'prenom' => 'François',
        //'nom'    => 'Dupont'  );
        foreach ($mon_tableau as $cle => $valeur){
            echo "$cle : $valeur\n";
        }
        for ($i = 0; $i < count($mon_tableau); $i++) {
            echo $mon_tableau[$i];
        }

        echo nl2br("\n");
        echo nl2br("\n");
        echo "exo 3";
        echo nl2br("\n");
        $prenom = "Marc";

        echo "Bonjour " . $prenom;
        echo "Bonjour $prenom";
        echo 'Bonjour $prenom';

        echo $prenom;
        echo "$prenom";

        echo nl2br("\n");
        $marque= "Tesla";
        $couleur = "Noir";
        $immatriculation= "00734";

        echo nl2br("\n");

        echo "Voiture $immatriculation de marque $marque (couleur $couleur)";

        echo nl2br("\n");

        $voiture1['marque']= $marque;
        $voiture1['couleur']= $couleur;
        $voiture1['immatriculation']= $immatriculation;

        var_dump($voiture1);
        echo nl2br("\n");
        echo "Voiture " . $voiture1['immatriculation'] . " de marque " . $voiture1['marque'] . " (couleur " . $voiture1['couleur'] . ")";
        
        $voiture2['marque']= "Toyota";
        $voiture2['couleur']= "Rouge";
        $voiture2['immatriculation']= "23458";

        $voiture3['marque']= "Wiko";
        $voiture3['couleur']= "Orange";
        $voiture3['immatriculation']= "8730";

        $voitures[] = $voiture1;
        $voitures[] = $voiture2;
        $voitures[] = $voiture3;
        echo nl2br("\n");
        var_dump($voitures);
        echo nl2br("\n");

        echo "<p>" . "<h1>" . "Liste des voitures" ."<h2>" .  "</p>";
        if (empty($voitures)){
            echo "Il n'y a pas de voiture" ;
        }
        else{
            echo "<ul>";
            foreach ($voitures as $voitures){
                echo "<li>";
                echo "Voiture " . $voitures['immatriculation'] . " de marque " . $voitures['marque'] . " (couleur " . $voitures['couleur'] . ")";
                echo "</li>";
            }
            echo "</ul>";
        }



        










        ?>
    </body>
</html> 