<?php

include("bdconnect.php");

session_start();

if (isset($_SESSION['nom_utilisateur'])){
echo "votre prenom est: " .$_SESSION['prenom'] ."<br />";
echo "votre nom est: " .$_SESSION['nom'] ."<br />";
echo "votre email est: " .$_SESSION['adresse_mail_client'] ."<br />";
}
?>

<br />
<a href="logout.php">Déconnexion</a>