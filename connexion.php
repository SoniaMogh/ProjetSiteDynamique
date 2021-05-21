<?php
function connexion(){
    $connect = mysqli_connect("localhost","root","","SiteWebDynamique");
    if($connect) return $connect;
    else return null;
}
?>

