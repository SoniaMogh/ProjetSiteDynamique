<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Mon Profil</title>
    </head>
    <body>

        <?php
        $connect = mysqli_connect("127.0.0.1", "root", "","SiteWebDynamique");
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
                    
                    echo 'ID : ' . $Id . "<br />";
                    echo 'Nom : ' . $nomc . "<br />";
                    echo 'Prenom : ' . $prenomc . "<br />";
                    echo 'Email : ' . $mailc . "<br />";
                    echo 'Telephone : ' . $telephonec . "<br />"; 
                    echo 'Adresse : ' . $ruec . " " . $villec . " ". $codepostalc . "<br />";
                    echo 'Sexe : ' . $sexec . "<br />";
                    echo 'Situation : ' . $situationc . "<br />"; 
                    echo 'Date de Naissance : ' . $naissancec . "<br />";
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
    
    </body>
</html>
