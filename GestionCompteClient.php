<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="StyleProjet.css">
        <title>Mon Compte Client</title>
    </head>
    <body>
        <?php
          if (isset($_GET["Email"])) {
            $Login1 = $_GET["Email"];
            echo "<a href='Consulter_profil.php?Emailc=$Login1'>Consulter mon Profil </a><br/><br/>";
            echo "<a href='Modifier_profil.php?Emailm=$Login1'>Modifier mes Informations</a><br/><br/>";

            echo "<a href='GestionCommande.php?EmailCom=$Login1'>Passer une Commande</a><br/><br/>";
            echo "<a href='Ajout_Commentaire.php'>Ajouter un Commentaire</a><br/><br/>";
          }

        ?>
    </body> 
</html>

