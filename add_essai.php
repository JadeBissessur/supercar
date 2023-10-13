<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Ajouter - Essai </title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse_mail_client = $_POST['adresse_mail_client'];
    $adresse_physique_client = $_POST['adresse_physique_client'];
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $telephone = $_POST['telephone'];
    $date_debut_essai = $_POST['date_debut_essai'];
    $heure_debut_essai = $_POST['heure_debut_essai'];
    $heure_fin_essai = $_POST['heure_fin_essai'];
    $statut = $_POST['statut'];

    // Use prepared statements to insert data safely
    $requete = "INSERT INTO demande_essai (nom_utilisateur, nom, prenom, adresse_mail_client, adresse_physique_client, marque, modele, telephone, date_debut_essai, heure_debut_essai, heure_fin_essai, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = mysqli_prepare($bdd, $requete);
    
    if ($stmt) {
        // Bind the parameters with the actual data
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $nom_utilisateur, $nom, $prenom, $adresse_mail_client, $adresse_physique_client, $marque, $modele, $telephone, $date_debut_essai, $heure_debut_essai, $heure_fin_essai, $statut);
        
        // Execute the statement
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo '<script>alert("Ajout réussi !")</script>';
            header("Refresh: 0; URL='gestion_essai.php'");
        } else {
            echo '<script>alert("Echec: ' . mysqli_error($bdd) . '")</script>';
        }
        
        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Echec: ' . mysqli_error($bdd) . '")</script>';
    }
}
?>

<form method="POST" class="formulaire">
    <input type="text" name="nom_utilisateur" class="input" placeholder="Nom d'utilisateur">
    <input type="text" name="nom" class="input" placeholder="Nom">
    <input type="text" name="prenom"  class="input"placeholder="Prénom">
    <input type="mail" name="adresse_mail_client" class="input" placeholder="Adresse e-mail client">
    <input type="text" name="adresse_physique_client" class="input" placeholder="Adresse physique client">
    <input type="text" name="marque" class="input" placeholder="Marque">
    <input type="text" name="modele"class="input" placeholder="Modèle">
    <input type="text" name="telephone" class="input" placeholder="Téléphone">
    <input type="date" name="date_debut_essai" class="input" placeholder="Date de début d'essai">
    <input type="time" name="heure_debut_essai" class="input" placeholder="Heure de début d'essai">
    <input type="time" name="heure_fin_essai" class="input" placeholder="Heure de fin d'essai">
    <input type="text" name="statut" class="input" placeholder="Statut">
    <input type="submit" value="Ajouter">
</form>

</body>
</html>
