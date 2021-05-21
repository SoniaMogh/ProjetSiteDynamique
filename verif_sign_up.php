<?php
    $connect = mysqli_connect("127.0.0.1", "root", "","SiteWebDynamique");
    if($connect) {
        echo "connexion réussie <br/>";
    }
    else {
        echo "echec de connexion";
    }
   
    $Nom = mysqli_real_escape_string($connect, $_POST["Nom"]);
    $Prenom = mysqli_real_escape_string($connect, $_POST["Prenom"]);
    $Email = mysqli_real_escape_string($connect, $_POST["Adresse_mail"]);
    $Telephone = mysqli_real_escape_string($connect, $_POST["Numero"]);
    $CodePostal = $_POST["CodePostal"];
    $Ville = mysqli_real_escape_string($connect, $_POST["Ville"]);
    $Rue = mysqli_real_escape_string($connect, $_POST["Rue"]);
    $Sexe = mysqli_real_escape_string($connect, $_POST["Sexe"]);
    $Situation = mysqli_real_escape_string($connect, $_POST["Sit_Fam"]);
    $Naissance = mysqli_real_escape_string($connect, $_POST["Date_Naissance"]);
    $Password = $_POST["Mot_de_passe"];
    
    $req = "SELECT Email FROM client(Nom, Prenom, Email, Telephone, CodePostal, Ville, Rue, Sexe, Situation, Naissance, Password) 
        VALUES(?,?,?,?,?,?,?,?,?,?,?)";
    
    $res = mysqli_prepare($connect,$req);
    $var = mysqli_stmt_bind_param($res, 'ssssissssss', $Nom, $Prenom, $Email, $Telephone, $CodePostal, $Ville, $Rue, $Sexe, $Situation, $Naissance, $Password);
    $var = mysqli_stmt_execute($res); // exécution de la requête

    if($var == false) {
        echo "echec de l'exécution de la requête.<br />";
    }
    else {
        header("location: Authentification.php");
    }

    mysqli_stmt_close($res);

    if(mysqli_close($connect)) {
        echo "deconnexion réussite <br />";
    }
    else {
        echo "echec de deconnexion". "<br />";
    }
?>
