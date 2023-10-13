<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin - Voiture</title>
        <link rel="stylesheet" href="style/gestion_contact_style.css">
    </head>
    <body>

<?php
echo "<div class='container'>";
echo "<a href='admin_utilisateur.php?'> Retour </a>";
echo "<a href='add_voiture.php?' class='ajouter'> Ajouter </a>";
echo "<table>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th> Marque </th>
            <th> Modele </th>
            <th> Annee </th>
            <th> Prix </th>
            <th> Description1 </th>
            <th> Description </th>
            <th> Image </th>
            <th> Options</th>
        </tr>
        <thead>";

include("bdconnect.php");

session_start();
if(!isset($_SESSION['utilisateur'])){header('location:admin.php');}

$requete = "SELECT * FROM voitures";
$result = $bdd->query($requete);

if ($result->num_rows > 0) {
    $count = 0;
    while($row = $result->fetch_assoc()) {

    echo "<tbody><tr>";
    echo "<td>" . $row["idvoiture"] . "</td>";
    echo "<td>" . $row["marque"] . "</td>";
    echo "<td>" . $row["modele"] . "</td>";
    echo "<td>" . $row["annee"] . "</td>";
    echo "<td>" . $row["prix"] . "</td>";
    echo "<td>" . $row["description1"] . "</td>";
    echo "<td>" . $row["description"] . "</td>";
    echo "<td>" . $row["image"] . "</td>";

    echo "<td class='icons' ><a href='edit_voiture.php?id=" . $row["idvoiture"] . "'><img src='logos/edit.png' width='20px'></a> | <a href='delete_voiture.php?id=" . $row["idvoiture"] . "'><img src='logos/delete.png' width='20px'></a></td>";
    echo "</tr>
        </tbody>";

}

echo "</table>";

echo "</div>";

}

?>

    </body>

</html>

 