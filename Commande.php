<?php
session_start();
$_SESSION['quantite'] = $_SESSION['quantite']." ". $_POST['quantite']." ";    
?>

<?php
    $connect = mysqli_connect("127.0.0.1", "root", "","SiteWebDynamique");
    if($connect) {
        echo "connexion réussie <br/>";
    }
    else {
        echo "echec de connexion";
    }
    $Mail=$_GET["Mail"];
    $Ref = $_GET["Ref"];
    $sql = "SELECT quantite FROM produits WHERE ref = ?";
    $result = mysqli_prepare($connect, $sql);
    $varc = mysqli_stmt_bind_param($result, 'i', $Ref);
    $varc = mysqli_stmt_execute($result);

    if ($varc == FALSE){
        echo "echec de l'exécution de la requête.<br />";
        }
    else {
        $varc = mysqli_stmt_bind_result($result, $Quantite);
        mysqli_stmt_fetch($result);
        if ($Quantite >= $_POST["quantite"]){
                header("location: GestionCommande.php?message=MauvaiseRef&EmailCom=$Mail");
        }
        else{
            $Quan = $Quantite - $_POST["quantite"];
            //$sql1 = "UPDATE client SET quantite = ? WHERE ref = ?";
            //$result1 = mysqli_prepare($connect, $sql1);
            //$varc = mysqli_stmt_bind_param($result1, 'i', $Quan);
            //$varc = mysqli_stmt_execute($result1);
            header("location: Facture.php");
        }
    }

?>

