<?php
include 'connexion.php';
if(connexion()) echo "connexion ok <br/>";
if(isset($_GET["ref"])){
    $refs = $_GET["ref"];
//  if(isset($_GET["quantite"])){
//	$quantitesupp = $_GET["quantite"];
//      if($quantitesupp=='0'){
        $sql = "DELETE FROM produits WHERE ref=$refs";
//}
        
	if (mysqli_query(connexion(), $sql)) {
    	$message= "Le produit a été supprimé avec succés";
	} else {
    	$message="Erreur pendant la suppression du produit: " . mysqli_error(connexion());
//    }}
//    else {
//        $message= "Le produit est encore disponible.";
    }

    //header("Location:suppProd.php?message=$message");
   header("Location:AjouterProduits.php?message=$message");

}

