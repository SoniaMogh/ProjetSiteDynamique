<?php
if (empty($_COOKIE['log']))
{
    setcookie('log', 'jeankevin', time() + 7*24*3600, null, null, false, true);//securitée : active
    setcookie('mp', 'X0X0', time() + 7*24*3600, null, null, false, true);      // le mode  httpOnly
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="index.css">
        <title>Accueil</title>
    </head>
    <body>
       
        

        <header>
            <h1>E-commerce de oieuzbrj</h1>

            <a href="Authentification.php">S'identifier </a>
            <a href="Inscription.php"> Inscription </a>

         </header>

         <br/>

         <article>
             <h1> Description de la société </h1>
             <p>
             Description
             </p>
         </article>
         
         
       
    </body>
    <footer> <p class="ContactSociete"> Adresse : 54 rue de la mort      Tel : 06.06.06.06.06</p></footer>
</html>
