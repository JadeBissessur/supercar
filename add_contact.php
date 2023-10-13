<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Ajouter - Contact </title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse_mail_contact = $_POST["adresse_mail_contact"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $requete = "INSERT INTO contact (nom, prenom, adresse_mail_contact, sujet, message) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($bdd, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $adresse_mail_contact, $sujet, $message);
        
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo '<script>alert("Ajout réussi !")</script>';
            header("Refresh: 0; URL='gestion_contact.php'");
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
    <input type="text" name="nom" class="input" placeholder="Nom">
    <input type="text" name="prenom" class="input" placeholder="Prénom">
    <input type="text" name="adresse_mail_contact" class="input" placeholder="Adresse e-mail">
    <input type="text" name="sujet" class="input" placeholder="Sujet">
    <input type="text" name="message" class="message" placeholder="Message">
    <input type="submit" value="Valider">
</form>

</body>
</html>
