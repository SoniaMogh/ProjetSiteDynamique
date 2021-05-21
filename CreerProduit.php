<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CreerProduit.css">
        <title>Gérer les produits</title>
    </head>
    <body>
        <div class="navig">
            <h3>Menu</h3>
            <a href="CreerProduit.php">Creer un produit</a>
            <a href="VoirProduits.php">Afficher les produits</a>
            <a href="">Voir les commentaires clients</a>
            <a href="">Deconnexion</a>
        
        </div>
        
        <h1>Creer un produit</h1>
        <form action="VoirProduits.php" method="POST">
                       
            <fieldset>
                <legend>Ajouter un produit</legend>
                <label for="lib">Libellé</label>
                <input type="text" name="libelle" id="lib" requierd minlength="3"/>
                <label for="cat">Catégorie</label>
                <select name="categorie" id="cat">
                    <option value="PC">PC</option>
                    <option value="Imprimante">Imprimante</option>
                    <option value="Scanner">Scanner</option>
                </select>
                <label for="marque">Marque</label>
                <select name="marque" id="marque">
                    <option value="Dell">Dell</option>
                    <option value="Asus">Asus</option>
                    <option value="Mac">Mac</option>
                </select>
                <label for="qte">Quantité en stock</label>
                <input type="text" name="quantite" id="qte" pattern="[0-9]+" requierd/>
                <label for="prix">Prix unitaire (ex: 10.00)</label>
                <input type="text" placeholder="0.00" id="prix" name="prix" pattern="[0-9]+.[0-9]{2}" requierd/>
                <label for="tva">TVA</label> <input type="text" name="tva" id="tva" />
                <label for="desc">Description</label> <textarea name="description" id="desc" /> </textarea>
            </fieldset>   
            <input type="submit" id="idenvoyer" value="Ajouter" name="Valider">
            
        </form>
        
                
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>