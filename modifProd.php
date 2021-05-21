<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="modifProd.css">
        <title>Modif Prod</title>
    </head>
    <body>
        <div class="navig">
            <h3>Menu</h3>
            <a href="CreerProduit.php">Creer un produit</a>
            <a href="VoirProduits.php">Afficher les produits</a>
            <a href="">Voir les commentaires clients</a>
            <a href="">Deconnexion</a>
        
        </div>
        <h1>Modification du produit</h1>
<?php
include 'connexion.php';
if(isset($_GET["ref"])){
        $refm = $_GET["ref"];
        $sql = "SELECT * FROM produits WHERE ref=$refm";
	$result = mysqli_query(connexion(), $sql);
	if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        $ref=$row["ref"];
        $libelle=$row["libelle"];
        $categorie=$row["categorie"];
        $marque=$row["marque"];
        $quantite=$row["quantite"];
        $prix=$row["prix"];
        $tva=$row["TVA"];
        $description=$row["description"];
    }  
        else{
        $message="Le produit est introuvable";
        header("Location:CreerProduit.php?message=$message");
        }
    }
    
if(isset($_POST["libelle"]) && isset($_POST["categorie"])&& isset($_POST["marque"])&& 
        isset($_POST["quantite"])&& isset($_POST["prix"])&& isset($_POST["tva"])&& isset($_POST["description"])){
    
    $ref = mysqli_real_escape_string(connexion(),$_POST["ref"]);
    $libelle = mysqli_real_escape_string(connexion(), $_POST["libelle"]);
    $categorie = mysqli_real_escape_string(connexion(), $_POST["categorie"]);
    $marque = mysqli_real_escape_string(connexion(), $_POST["marque"]);
    $quantite = mysqli_real_escape_string(connexion(), $_POST["quantite"]);
    $prix = mysqli_real_escape_string(connexion(), $_POST["prix"]);
    $tva = mysqli_real_escape_string(connexion(), $_POST["tva"]);
    $description = mysqli_real_escape_string(connexion(), $_POST["description"]);
        
        
$sql = "update  produits set libelle='$libelle', categorie='$categorie' ,
    marque='$marque' , quantite='$quantite', prix='$prix', tva='$tva', description='$description' 
     WHERE ref=$ref";

	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le produit a été mis à jour avec succes";
	} else {
    	$message = "Erreur de mise à jour " ;
	}
	header("Location:VoirProduits.php?message=$message");

}
?>

        <form name="exe" action="modifProd.php" method="post">
      		<fieldset>
                    <legend>Modifier un produit</legend>
                    <input type="hidden" id="ref" name="ref" value="<?php if(isset($ref)) { echo $ref; } ?>"><br/>
                    <label for="lib">Libellé</label><?php echo $libelle; ?>
                    <input type="hidden" id="lib" name="libelle" value="<?php if(isset($libelle)) { echo $libelle; } ?>"><br/>
                    <label for="cat">Catégorie</label><?php echo $categorie; ?>
                    <input type="hidden" id="cat" name="categorie" value="<?php if(isset($categorie)) { echo $categorie; } ?>"><br/>
                    <label for="marque">Marque</label><?php echo $marque; ?>
                    <input type="hidden" id="marque" name="marque" value="<?php if(isset($marque)) { echo $marque; } ?>"><br/>
                  
                    <label for="qte">Quantité en stock</label>
                    <input type="text" placeholder="1" id="idQte" name="quantite" required value="<?php if(isset($quantite)) { echo $quantite; } ?>"><br/>
                    <label for="prix">Prix unitaire (ex: 10.00)</label>
                    <input type="text" placeholder="0.00" id="idPrix" name="prix" pattern="[0-9]+.[0-9]{2}" required value="<?php if(isset($prix)) { echo $prix; } ?>"><br/>
                    <label for="tva">TVA</label>
                    <input type="text" name="tva"  required value="<?php if(isset($tva)) { echo $tva; } ?>"><br/>
                    <label for="desc">Description</label> 
                    <textarea id="idDes" name="description" value="<?php echo $description;  ?>"> </textarea>

      		</fieldset>
            <input type="submit" id="idenvoyer" value="Modifier" name="Modifier">
      </form>
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>