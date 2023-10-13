<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin - Accueil</title>
        <link rel="stylesheet" href="style/gestion_essai_style.css">
    </head>
    <body>

<?php
echo "<div class='container'>";
echo "<a href='add_essai.php?' class='ajouter'> Ajouter </a>";
echo "<table>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Nom d'Utilisateur</th>
            <th>Nom</th><th>Prenom</th>
            <th>Adresse Mail</th>
            <th>Adresse Physique</th>
            <th>Telephone</th>
            <th> Marque </th>
            <th> Modele </th>
            <th> Date de Debut </th>
            <th> Heure de Debut </th>
            <th> Heure de Fin </th>
            <th> Statut </th>

            <th>Options</th>
        </tr>
        <thead>";

include("bdconnect.php");

session_start();
if(!isset($_SESSION['utilisateur'])){header('location:admin.php');}

$requete = "SELECT * FROM demande_essai";
$result = $bdd->query($requete);

if ($result->num_rows > 0) {
    $count = 0;
    while($row = $result->fetch_assoc()) {

    echo "<tbody><tr>";
    echo "<td>" . $row["idessai"] . "</td>";
    echo "<td>" . $row["nom_utilisateur"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["prenom"] . "</td>";
    echo "<td>" . $row["adresse_mail_client"] . "</td>";
    echo "<td>" . $row["adresse_physique_client"] . "</td>";
    echo "<td>" . $row["telephone"] . "</td>";
    echo "<td>" . $row["marque"] . "</td>";
    echo "<td>" . $row["modele"] . "</td>";
    echo "<td>" . $row["date_debut_essai"] . "</td>";
    echo "<td>" . $row["heure_debut_essai"] . "</td>";
    echo "<td>" . $row["heure_fin_essai"] . "</td>";
    echo "<td>" . $row["statut"] . "</td>";


    echo "<td class='icons' ><a href='edit_essai.php?id=" . $row["idessai"] . "'><img src='logos/edit.png' width='20px'></a> | <a href='delete_essai.php?id=" . $row["idessai"] . "'><img src='logos/delete.png' width='20px'></a></td>";
    echo "</tr>
        </tbody>";

}

echo "</table>";

echo "</div>";

}

?>

    </body>

</html>

 