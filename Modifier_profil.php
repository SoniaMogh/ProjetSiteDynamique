<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Modifier_profil.css">
        <title>Modification du Profil</title>
    </head>
    
    <body>
        <br/><h1>Modification du Profil</h1> <br/>
        <div class="navig">
            <h3>Menu</h3>
        <?php
          if (isset($_GET["Emailm"])) {
            $Login1 = $_GET["Emailm"];
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
            $connect = mysqli_connect("127.0.0.1", "root", "","GestionProduits");
            if($connect) {
                echo "connexion réussie <br/>";
            }
            else {
                echo "echec de connexion";
            }
            
            if(isset($_GET["Emailm"])){
                //protection de données

                $mailm = mysqli_real_escape_string($connect, $_GET["Emailm"]);
                $sql = "SELECT Id_client, Nom, Prenom, Telephone, CodePostal, Ville, Rue, Sexe, Situation, Naissance FROM client WHERE Email = ?";
                $result = mysqli_prepare($connect, $sql);
                $varm = mysqli_stmt_bind_param($result, 's', $mailm);
                $varm = mysqli_stmt_execute($result);
                
                if ($varm == FALSE){
                    echo "echec de l'exécution de la requête.<br />";
                }
                else {
                    
                $varm = mysqli_stmt_bind_result($result, $idM, $nomM, $prenomM, $telephoneM, $codepostalM, $villeM, $rueM, $sexeM, $situationM, $naissanceM);
                mysqli_stmt_fetch($result);
                }
            }
        ?> 

        <form action="Verif_modif.php" method="POST" name="formulation">
            
            Id : <input type="text" id="idm" name="idm" readonly value="<?php echo $idM; ?> " <br><br>
            
            <fieldset>
                <legend>Coordonnees</legend>
                <label for="idnomMod"> Nom : </label>
                <input type="text" name="NomMod" id="idnomMod" required value="<?php if(isset($nomM)){ echo $nomM;} ?>"
                minlength="2">
                <br/> 
                <label for="idprenomMod"> Prenom : </label> 
                <input type="text" name="PrenomMod" id="idprenomMod" required value="<?php if(isset($prenomM)) { echo $prenomM;} ?>"
                minlength="2"/> 
            
            </fieldset> <br/> 

            <fieldset>
                <legend>Contact</legend>
                <label for="idemailMod"> Adresse mail : </label> 
                <input type="email" name="Adresse_mailMod" id="idemailMod" required value="<?php if(isset($mailm)) { echo $mailm;} ?>"
                pattern = "[A-Za-z]{1,}+.+[A-Za-z]{1,}+@gmail.com" />              

                <br/> 

                <label for="idtelMod"> Numero de telephone : </label> 
                <input type="tel" name="NumeroMod" id="idtelMod" required value="<?php if(isset($telephoneM)) { echo $telephoneM;} ?>"
                pattern = "0{1}[0-9]{9}"/>

                <br/> 

                
                <legend><b>Adresse Postale</b></legend>
                    <label for="idPostalMod"> Code Postal : </label>  
                    <input type="text" name="CodePostalMod" id="idPostalMod" required value="<?php if(isset($codepostalM)) { echo $codepostalM;} ?>"
                    minlength="5" minlength="5"/> 
                    
                    <br/> 
                    
                    <label for="idVilleMod"> Ville : </label>  
                    <input type="text" name="VilleMod" id="idVilleMod" required value="<?php if(isset($villeM)) { echo $villeM;} ?>" />
                    
                    <br/>
                    
                    <label for="idRueMod"> Rue : </label>  
                    <input type="text" name="RueMod" id="idRueMod" required value="<?php if(isset($rueM)) { echo $rueM;} ?>" />
                
                
            </fieldset> <br/>  

            <fieldset>
                <legend>Informations Generales</legend>       
                
                Sexe :
                <select name="SexeMod">
                    <option value="<?php if(isset($sexeM)) { echo $sexeM;} ?>"><?php if(isset($sexeM)) { echo $sexeM;} ?></option>
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                    <option value="Autre">Autre</option>
                </select>

                <br/>  
                Situation Familiale :
                <select name="Sit_FamMod">
                    <option value="<?php if(isset($situationM)) { echo $situationM;} ?>"><?php if(isset($situationM)) { echo $situationM;} ?></option>
                    <option value="Marie">Marie(e)</option>
                    <option value="Pacse">Pacse(e)</option>
                    <option value="Divorce">Divorce(e)</option>
                    <option value="Separe">Sépare(e)</option>
                    <option value="Celibataire">Celibataire</option>
                    <option value="Veuf">Veuf(ve)</option>
                </select>

                <br/>

                <label for="idNaissanceMod"> Date de Naissance : </label>  
                <input type="date" name="Date_NaissanceMod" id="idNaissanceMod" value="<?php if(isset($naissanceM)) { echo $naissanceM;} ?>" /> 
                
            </fieldset> <br/>  

            <input type="submit" id="idenvoyer" name="Modifier" value="Modifier" /> 
            <input type="reset" id="idreset" name="reset" value="reset"/> 
            
        </form>
        </div>
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>

