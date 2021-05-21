<?php
session_start();
$_SESSION['Profil'] = "";
$_SESSION['Login'] = "";
$_SESSION['Mot_de_passe'] = "";

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="StyleProjet.css">
        <title>Authentification</title>
    </head>
    
    <body>
        <h1>S'identifier</h1> <br/>
        
        <form action="verif.php" method="POST" name="Authentification">
            <?php
            //echo "login : [".$_COOKIE['log'] ."] mot de passe [" .$_COOKIE['mp']."]";
            ?><br/> 
            
            <input type="radio" name="Profil" value="Manager" /> Manager
            <input type="radio" name="Profil" value="Client" /> Client

            <br/> 

            <label for="idlogin"> Login : </label> 
            <input type="email" name="Login" id="idlogin" 
            pattern = "[A-Za-z]{1,}+.+[A-Za-z]{1,}+@gmail.com" required/> 
            
            <br/>
            
            <label for="idpassword"> Mot de passe : </label>  
            <input type="password" name="Mot_de_passe" id="idpassword" required 
            minlength="8"
            pattern = "[A-Z]{1}[A-Za-z0-9]{1,}[a-z]{1}"> 
            <br/>
            <input type="submit" name="envoyer" value="envoyer" /> 
            <input type="reset" name="reset" value="reset"/> 
            <br/><br/>
            <a href="verif_mana.php">Manager déja connecté ?</a>
            
            <?php
            if(isset($_GET['message'])&&$_GET['message']=='Vide'){
                echo "<p style='color:red'>Les champs login et mot de passe sont requis</p>";
            }
            else if (isset($_GET['message'])&&$_GET['message']=='Passfaux'){
                echo "<p style='color:red'>Votre mot de passe est incorrect</p>";
            }
            else if (isset($_GET['message'])&&$_GET['message']=='ProfilVide'){
                echo "<p style='color:red'>Veuillez entrer un profil</p>";
            }
            else if (isset($_GET['message'])&&$_GET['message']=='Loginfaux'){
                echo "<p style='color:red'>Aucun compte associé à ce login</p>";
            }
            else if (isset($_GET['message'])&&$_GET['message']=='Mananull'){
                echo "<p style='color:red'>Pas de manager enregistré.<br/>Veuillez vous connecter régulierement.</p>";
            }
            else {
            }
            
            
            ?>
           
        </form>
    </body> 
</html>

