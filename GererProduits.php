<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="StyleProjet.css">
        <title>Gérer les produits</title>
    </head>
    <body>
        <form action="AjouterProduits.php" method="POST">
                       
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
                <label for="tva">TVA</label> <input type="text" name="tva" id="tva" requierd/>
                <label for="desc">Description</label> <textarea name="description" id="desc" /> </textarea>
                
                <input type="submit" value="Ajouter" name="Valider">
            </fieldset>
        </form>
        <a href ="AjouterProduits.php">Afficher liste des produits</a><br/>
                
    </body>
</html>