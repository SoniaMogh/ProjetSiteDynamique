<?php
    if ($_COOKIE['log'] != 'jeankevin'){
    header("location: MenuManager.php");
    }   
    else {
    header("location: Authentification.php?message=Mananull");
    }
?>
