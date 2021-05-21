<?php
session_start();
$_SESSION['quantite'] = "";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Liste des produits</title>
        <link rel="stylesheet" href="StyleProjet.css">
        <meta charset="utf-8">

    </head>
    <body>
        <table border="1">
            <tr>
            <th>Ref</th>
            <th>Libelle</th>
            <th>Categorie</th>
            <th>Marque</th>
            <th>Quantite</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Quantité</th>
            <th>Passer Commande</th>
            </tr>
            
            <?php
                $connect = mysqli_connect("127.0.0.1", "root", "","sitewebdynamique");
                if($connect) {
                    echo "connexion réussie <br/>";
                }
                else {
                    echo "echec de connexion";
                }
                
                $mailCom = $_GET["EmailCom"];

                $sql = "SELECT * FROM produits";
                $result = mysqli_query($connect, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $Ref=$row["ref"];
                        echo "<tr><td>".$row["ref"]."</td>"
                            . "<td>".$row["libelle"]."</td>"
                            . "<td>".$row["categorie"]."</td>"
                            . "<td>".$row["marque"]."</td>"
                            . "<td>".$row["quantite"]."</td>"
                            . "<td>".$row["prix"]."</td>"
                            . "<td>".$row["description"]."</td>"
                            . "<td> <form action='Commande.php?Mail=$mailCom&Ref=$Ref' method='POST' name='commande'>
                                    <input type='number' name = 'quantite' min='1' max='100'/></td>"
                            . "<td>". "<input type='submit' name='Commander' value='Commander'/>". "</td></tr>";
                    }
                }
                if(isset($_GET['message'])&&$_GET['message']=='MauvaiseRef'){
                    echo "<p style='color:red'>La quantité que vous avez demandé n'est pas disponible</p>";}
                
                  
            ?>

        </table> <br/>
    </body>
</html>