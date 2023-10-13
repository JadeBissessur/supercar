<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Ajouter - Evenement</title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $soustitre = $_POST["soustitre"];
    $description_event = $_POST["description_event"];
    $description_info = $_POST["description_info"];
    $image = $_POST["image"];

    $requete = "INSERT INTO evenement (titre, soustitre, description_event, description_info, image) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($bdd, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $titre, $soustitre, $description_event, $description_info, $image);
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo '<script>alert("Ajout réussi !")</script>';
            header("Refresh: 0; URL='gestion_event.php'");
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
    <input type="text" name="titre" class="input" placeholder="Titre">
    <input type="text" name="soustitre" class="input" placeholder="Sous-titre">
    <input type="text" name="description_event" class="input" placeholder="Description de l'événement">
    <input type="text" name="description_info" class="message" placeholder="Description d'information">
    <input type="text" name="image" class="input" placeholder="Image">
    <input type="submit" value="Ajouter">
</form>

</body>
</html>
