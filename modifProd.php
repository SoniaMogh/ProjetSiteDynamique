<?php
include 'connexion.php';
if(connexion()) echo "connexion ok <br/>";
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
        $description=$row["description"];
    }  
        else{
        $message="Le produit est introuvable";
        header("Location:AjouterProduits.php?message=$message");
        }
    }
    
if(isset($_POST["libelle"]) && isset($_POST["categorie"])&& isset($_POST["marque"])&& 
        isset($_POST["quantite"])&& isset($_POST["prix"])&& isset($_POST["description"])){
    
    $ref = mysqli_real_escape_string(connexion(),$_POST["ref"]);
    $libelle = mysqli_real_escape_string(connexion(), $_POST["libelle"]);
    $categorie = mysqli_real_escape_string(connexion(), $_POST["categorie"]);
    $marque = mysqli_real_escape_string(connexion(), $_POST["marque"]);
    $quantite = mysqli_real_escape_string(connexion(), $_POST["quantite"]);
    $prix = mysqli_real_escape_string(connexion(), $_POST["prix"]);
    $description = mysqli_real_escape_string(connexion(), $_POST["description"]);
        
        
$sql = "update  produits set libelle='$libelle', categorie='$categorie' ,
    marque='$marque' , quantite='$quantite', prix='$prix', description='$description' 
     WHERE ref=$ref";

	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le produit a été mis à jour avec succes";
	} else {
    	$message = "Erreur de mise à jour " ;
	}
	header("Location:AjouterProduits.php?message=$message");
        }
?>
        <form name="exe" action="modifProd.php" method="post">
      		<fieldset>
                    <legend>Modifier un produit</legend>
                    <input type="hidden" id="id" name="ref" value="<?php if(isset($ref)) { echo $ref; } ?>"><br/>
                    Libellé <input type="text" id="idLib" name="libelle" required value="<?php if(isset($libelle)) { echo $libelle; } ?>"><br/>
                    Catégorie 
                    <select name="categorie" required value="<?php if(isset($categorie)) { echo $categorie; } ?>">
                        <option value="PC">PC</option>
                        <option value="Imprimante">Imprimante</option>
                        <option value="Scanner">Scanner</option>
                    </select><br/>
                    Marque 
                    <select name="marque" required value="<?php if(isset($marque)) { echo $marque; } ?>" >
                        <option value="Dell">Dell</option>
                        <option value="Asus">Asus</option>
                        <option value="Mac">Mac</option>
                    </select><br/>
                    Quantité en stock <input type="text" placeholder="1" id="idQte" name="quantite" required value="<?php if(isset($quantite)) { echo $quantite; } ?>"><br/>
                    Prix unitaire <input type="text" placeholder="0.00" id="idPrix" name="prix" pattern="[0-9]+.[0-9]{2}" required value="<?php if(isset($prix)) { echo $prix; } ?>"><br/>
                    Description <textarea id="idDes" name="description" value="<?php echo $description;  ?>"> </textarea>
                    <input type="submit" value="Modifier" name="Modifier">
                        
                        
                        
                        
      		</fieldset>
      </form>
