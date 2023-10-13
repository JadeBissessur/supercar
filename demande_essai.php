<?php
session_start();
include("bdconnect.php");

$nom_utilisateur = $_POST['nom_utilisateur'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse_mail_client = $_POST['adresse_mail_client'];
$adresse_physique_client = $_POST['adresse_physique_client'];
$marque = $_POST['marque'];
$modele = $_POST['modele'];
$telephone = $_POST['telephone'];
$date_debut_essai = $_POST['date_debut_essai'];
$date_fin_essai = $_POST['date_fin_essai'];
$heure_debut_essai = $_POST['heure_debut_essai'];
$heure_fin_essai = $_POST['heure_fin_essai'];

if (empty($nom_utilisateur) || empty($nom) || empty($prenom) || empty($adresse_mail_client) || empty($adresse_physique_client) || empty($marque) || empty($modele) || empty($telephone) || empty($date_debut_essai) || empty($date_fin_essai) || empty($heure_debut_essai) || empty($heure_fin_essai)) {
  echo "Veuillez remplir tous les champs";
} else {
  $sql = "SELECT * FROM demande_essai WHERE nom_utilisateur = '$nom_utilisateur'";
  $curseur = mysqli_query($bdd, $sql);
  $num = mysqli_num_rows($curseur);

if ($num == 1) {
echo "<script>alert('Une demande a déjà été enregistrée sous ce nom d'utilisateur');</script>";
header("Refresh: 0; URL='supercar_essai.php'");
} else {
$reg = "INSERT INTO demande_essai(nom_utilisateur, nom, prenom, adresse_mail_client, adresse_physique_client, telephone, marque, modele, date_debut_essai, date_fin_essai, heure_debut_essai, heure_fin_essai) VALUES ('$nom_utilisateur', '$nom', '$prenom', '$adresse_mail_client', '$adresse_physique_client', '$telephone', '$marque', '$modele', '$date_debut_essai', '$date_fin_essai', '$heure_debut_essai', '$heure_fin_essai')";


if (mysqli_query($bdd, $reg)) {
  echo "<script>alert('Votre demande a été enregistrée');</script>";
  header("Refresh: 0; URL='supercar_essai.php'");

} else {
echo "Erreur : " . mysqli_error($bdd);
}
}



mysqli_free_result($curseur);
}


mysqli_close($bdd);
?>