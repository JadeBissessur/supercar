<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin - Evenement</title>
        <link rel="stylesheet" href="style/gestion_contact_style.css">
    </head>
    <body>

<?php


echo "<div class='container'>";
echo "<a href='admin_utilisateur.php?'> Retour </a>";
echo "<a href='add_event.php?' class='ajouter'> Ajouter </a>";
echo "<table>";
echo "<thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Sous Titre</th>
            <th>Description</th>
            <th>Image</th>
            <th>Options</th>
        </tr>
        <thead>";

include("bdconnect.php");
session_start();
if(!isset($_SESSION['utilisateur'])){header('location:admin.php');}

$requete = "SELECT * FROM evenement";
$result = $bdd->query($requete);

if ($result->num_rows > 0) {
    $count = 0;
    while($row = $result->fetch_assoc()) {

    echo "<tbody><tr>";
    echo "<td>" . $row["idevenement"] . "</td>";
    echo "<td>" . $row["titre"] . "</td>";
    echo "<td>" . $row["soustitre"] . "</td>";
    echo "<td class='description'>" . $row["description_info"] . "</td>";
    echo "<td>" . $row["image"] . "</td>";

    echo "<td class='icons' ><a href='edit_event.php?id=" . $row["idevenement"] . "'><img src='logos/edit.png' width='20px'></a> | <a href='delete_event.php?id=" . $row["idevenement"] . "'><img src='logos/delete.png' width='20px'></a></td>";
    echo "</tr></tbody>";

}

echo "</table>";

echo "</div>";

}

?>

    </body>

</html>