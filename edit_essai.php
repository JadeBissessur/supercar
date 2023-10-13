<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Modification - Essai </title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");
session_start();
if(!isset($_SESSION['utilisateur'])){header('location:admin.php');}

if (isset($_REQUEST['id'])) {
    $idessai = $_REQUEST['id'];
    
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


        $requete = "UPDATE demande_essai SET nom_utilisateur = '$nom_utilisateur', nom = '$nom', prenom = '$prenom', adresse_mail_client = '$adresse_mail_client', adresse_physique_client = '$adresse_physique_client'
        , marque = '$marque', modele = '$modele', telephone = '$telephone', date_debut_essai = '$date_debut_essai', heure_debut_essai = '$heure_debut_essai', heure_fin_essai = '$heure_fin_essai', statut = '$statut' WHERE idessai = $idessai";
        $result = mysqli_query($bdd, $requete);
        
        if ($result) {
            echo '<script>alert("Modification réussie !")</script>';
            header("Refresh: 0; URL='gestion_essai.php'");
        } else {
            echo '<script>alert("Échec: ' . mysqli_error($bdd) . '")</script>';
        }

    }

    $select_query = "SELECT * FROM demande_essai WHERE idessai = $idessai";
    $select_result = mysqli_query($bdd, $select_query);
    $update = mysqli_fetch_assoc($select_result);

}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $update['idessai']; ?>">
    <input type="text" name="nom_utilisateur" value="<?php echo $update['nom_utilisateur']; ?>">
    <input type="text" name="nom" value="<?php echo $update['nom']; ?>">
    <input type="text" name="prenom" value="<?php echo $update['prenom']; ?>">
    <input type="text" name="adresse_mail_client" value="<?php echo $update['adresse_mail_client']; ?>">
    <input type="text" name="adresse_physique_client" value="<?php echo $update['adresse_physique_client']; ?>">
    <input type="text" name="marque" value="<?php echo $update['marque']; ?>">
    <input type="text" name="modele" value="<?php echo $update['modele']; ?>">
    <input type="text" name="telephone" value="<?php echo $update['telephone']; ?>">
    <input type="text" name="date_debut_essai" value="<?php echo $update['date_debut_essai']; ?>">
    <input type="text" name="heure_debut_essai" value="<?php echo $update['heure_debut_essai']; ?>">
    <input type="text" name="heure_fin_essai" value="<?php echo $update['heure_fin_essai']; ?>">
    <input type="text" name="statut" value="<?php echo $update['statut']; ?>">


    <button type="submit">Valider</button>


</form>

</body>
</html>
