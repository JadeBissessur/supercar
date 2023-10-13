<?php
include("bdconnect.php");
session_start();

if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $requete = "SELECT nom_utilisateur, mot_de_passe FROM inscription WHERE nom_utilisateur=? AND mot_de_passe=?";
    $stmt = mysqli_prepare($bdd, $requete);
    mysqli_stmt_bind_param($stmt, "ss", $nom_utilisateur, $mot_de_passe);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    $num = mysqli_stmt_num_rows($stmt);

    if ($num == 1) {
        $_SESSION["nom_utilisateur"] = $nom_utilisateur;
        header("Location: supercar_accueil.php"); // Redirect to the accueil page
        exit(); // Make sure to exit after redirection
    } else {
        echo '<script>alert("Le nom d\'utilisateur ou le mot de passe est incorrect: ' . mysqli_error($bdd) . '")</script>';
        header("Refresh: 0; URL='supercar_connexion.php'");
        exit(); // Exit after the alert and refresh
    }

}
?>
