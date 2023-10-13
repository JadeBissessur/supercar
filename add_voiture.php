<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Ajouter - Voiture </title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marque = $_POST["marque"];
    $modele = $_POST["modele"];
    $annee = $_POST["annee"];
    $prix = $_POST["prix"];
    $description1 = $_POST["description1"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    $requete = "INSERT INTO voitures (marque, modele, annee, prix, description1, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($bdd, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $marque, $modele, $annee, $prix, $description1, $description, $image);
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo '<script>alert("Ajout réussi !")</script>';
            header("Refresh: 0; URL='gestion_voiture.php'");
        } else {
            echo '<script>alert("Echec: ' . mysqli_error($bdd) . '")</script>';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Echec: ' . mysqli_error($bdd) . '")</script>';
    }
}
?>

<form method="POST" class="formulaire">
    <input type="text" name="marque" class="input" placeholder="Marque">
    <input type="text" name="modele" class="input" placeholder="Modele">
    <input type="text" name="annee" class="input" placeholder="Annee">
    <input type="text" name="prix" class="input" placeholder="Prix">
    <input type="text" name="description1" class="input" placeholder="Description simple">
    <input type="text" name="description" class="message" placeholder="Description de la voiture">
    <input type="text" name="image" class="input" placeholder="Image">
    <input type="submit" value="Ajouter">
</form>

</body>
</html>
