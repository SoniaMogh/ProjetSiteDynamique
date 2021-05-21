<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Consulter_profil.css">
        <title>Mon Profil</title>
    </head>
    <body>
        <br/><h1>Consulter mon profil</h1> <br/>
        <div class="navig">
            <h3>Menu</h3>
        <?php
          if (isset($_GET["Emailc"])) {
            $Login1 = $_GET["Emailc"];
            echo "<a href='Consulter_profil.php?Emailc=$Login1'>Consulter mon Profil </a><br/><br/>";
            echo "<a href='Modifier_profil.php?Emailm=$Login1'>Modifier mes Informations</a><br/><br/>";

            echo '<a href="GestionCommande.php">Passer une Commande</a><br/><br/>';
            echo '<a href="GestionCommande.php">Ajouter un Commentaire</a><br/><br/>';
            echo '<a href="index.php" title="deconnection">Deconnection</a><br/><br/>';
          }

        ?>
        </div>
        <div class="contenu">
            <?php
            //echo "login : [".$_COOKIE['log'] ."] et mot de passe [" .$_COOKIE['mp']."]";
            ?><br/> 
        <?php
        $connect = mysqli_connect("127.0.0.1", "root", "","GestionProduits");
        if($connect) {
            echo "connexion réussie <br/>";
        }
        else {
            echo "echec de connexion";
        }
        if(isset($_GET["Emailc"])){
                //protection de données
                $mailc = mysqli_real_escape_string($connect, $_GET["Emailc"]);
                $sql = "SELECT Id_client, Nom, Prenom, Telephone, CodePostal, Ville, Rue, Sexe, Situation, Naissance FROM client WHERE Email = ?";
                $result = mysqli_prepare($connect, $sql);
                $var2 = mysqli_stmt_bind_param($result, 's', $mailc);
                $var2 = mysqli_stmt_execute($result);
                
                if ($var2 == FALSE){
                    echo "echec de l'exécution de la requête.<br />";
                }
                else {
                    $var2 = mysqli_stmt_bind_result($result, $Id, $nomc, $prenomc, $telephonec, $codepostalc, $villec, $ruec, $sexec, $situationc, $naissancec);
                    mysqli_stmt_fetch($result);
                    
                    echo '<h3>ID : ' . $Id . "<br />";
                    echo 'Nom : ' . $nomc . "<br />";
                    echo 'Prenom : ' . $prenomc . "<br />";
                    echo 'Email : ' . $mailc . "<br />";
                    echo 'Telephone : ' . $telephonec . "<br />"; 
                    echo 'Adresse : ' . $ruec . " " . $villec . " ". $codepostalc . "<br />";
                    echo 'Sexe : ' . $sexec . "<br />";
                    echo 'Situation : ' . $situationc . "<br />"; 
                    echo 'Date de Naissance : ' . $naissancec . "<br /></h3>";
                    mysqli_stmt_close($result);
                
                
                    
                if(mysqli_close($connect)) {
                    echo "deconnexion réussite <br />";}

                else {
                    echo "echec de deconnexion". "<br />";  }
                
                }
        }
                  
        else{
        //Si erreur envoie de message à la page ajout_livre.php
        $message="Une erreur s'est produite, veuillez reessayer dans quelques instants.";
        }
            ?>
    </div>
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>
