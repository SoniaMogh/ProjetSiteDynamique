<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
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
            

            $id = $_POST["idm"];                
            $Nom = mysqli_real_escape_string($connect, $_POST["NomMod"]);
            $Prenom = mysqli_real_escape_string($connect, $_POST["PrenomMod"]);
            $Email = mysqli_real_escape_string($connect, $_POST["Adresse_mailMod"]);
            $Telephone = mysqli_real_escape_string($connect, $_POST["NumeroMod"]);
            $CodePostal = $_POST["CodePostalMod"];
            $Ville = mysqli_real_escape_string($connect, $_POST["VilleMod"]);
            $Rue = mysqli_real_escape_string($connect, $_POST["RueMod"]);
            $Sexe = mysqli_real_escape_string($connect, $_POST["SexeMod"]);
            $Situation = mysqli_real_escape_string($connect, $_POST["Sit_FamMod"]);
            $Naissance = mysqli_real_escape_string($connect, $_POST["Date_NaissanceMod"]);

            $sqlm = "UPDATE client SET Nom = ?, Prenom = ?, Email = ?, Telephone = ?, CodePostal = ?, Ville = ?, Rue = ?, Sexe = ?, Situation = ?, Naissance = ? WHERE Id_client = $id";
            $resm = mysqli_prepare($connect,$sqlm);
            //liaison des paramètres
            $varm = mysqli_stmt_bind_param($resm, 'ssssisssss', $Nom, $Prenom, $Email, $Telephone, $CodePostal, $Ville, $Rue, $Sexe, $Situation, $Naissance);


            $varm = mysqli_stmt_execute($resm); // exécution de la requête

            if($varm == false) {
                $messageM2 = "Erreur d'enregistrement, veuillez réessayer ulterieurement. <br/> Si l'erreur persiste, veuillez contacter l'équipe" ;
                header("Location:GestionCompteClient.php?message=$messageM2&Email=$Email");
            }

            else {
                $messageM1= "La modification a bien été enregistrée";
                header("Location:GestionCompteClient.php?message=$messageM1&Email=$Email");
            }

            mysqli_stmt_close($resm);

            if(mysqli_close($connect)) {
                echo "deconnexion réussite <br />";
            }
            else {
                echo "echec de deconnexion". "<br />"; 
            }
        ?>

    </body>
</html>
