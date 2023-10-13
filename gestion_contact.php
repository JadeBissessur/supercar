<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link rel="stylesheet" href="style/gestion_contact_style.css">
    </head>
    <body>

<?php


echo "<div class='container'>";
echo "<a href='admin_utilisateur.php?'> Retour </a>";
echo "<a href='add_contact.php?' class='ajouter'> Ajouter </a>";
echo "<table>";
echo "<thead><tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Adresse Mail</th><th>Sujet</th><th> Message </th><th>Options</th></tr><thead>";

include("bdconnect.php");
session_start();
if(!isset($_SESSION['utilisateur'])){header('location:admin.php');}

$requete = "SELECT * FROM contact";
$result = $bdd->query($requete);

if ($result->num_rows > 0) {
    $count = 0;
    while($row = $result->fetch_assoc()) {

    echo "<tbody><tr>";
    echo "<td>" . $row["idcontact"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["prenom"] . "</td>";
    echo "<td>" . $row["adresse_mail_contact"] . "</td>";
    echo "<td>" . $row["sujet"] . "</td>";
    echo "<td>" . $row["message"] . "</td>";

    echo "<td class='icons' ><a href='edit_contact.php?id=" . $row["idcontact"] . "'><img src='logos/edit.png' width='20px'></a> | <a href='delete_contact.php?id=" . $row["idcontact"] . "'><img src='logos/delete.png' width='20px'></a></td>";
    echo "</tr></tbody>";

}

echo "</table>";

echo "</div>";

}

?>

    </body>

</html>