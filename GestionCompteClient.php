<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="GestionCompteClient.css">
        <title>Mon Compte Client</title>
    </head>
    <body>
        
        <div class="navig">
            <h3>Menu</h3>
        <?php
          if (isset($_GET["Email"])) {
            $Login1 = $_GET["Email"];
            echo "<a href='Consulter_profil.php?Emailc=$Login1'>Consulter mon Profil </a><br/><br/>";
            echo "<a href='Modifier_profil.php?Emailm=$Login1'>Modifier mes Informations</a><br/><br/>";

            echo "<a href='GestionCommande.php?EmailCom=$Login1'>Passer une Commande</a><br/><br/>";
            echo '<a href="GestionCommande.php">Ajouter un Commentaire</a><br/><br/>';
            echo '<a href="index.php" title="deconnection">Deconnexion</a><br/><br/>';
          }

        ?>
        </div>
    </body> 
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>

