<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title> Modification - Contact </title>
    <link rel="stylesheet" href="style/edit_contact.css">
</head>
<body>

<?php
include("bdconnect.php");

session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('location:admin.php');
}

if (isset($_REQUEST['id'])) {
    $idcontact = $_REQUEST['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse_mail_contact = $_POST["adresse_mail_contact"];
        $sujet = $_POST["sujet"];
        $message = $_POST["message"];
        
        // Use a prepared statement to update the contact
        $requete = "UPDATE contact SET nom = ?, prenom = ?, adresse_mail_contact = ?, sujet = ?, message = ? WHERE idcontact = ?";
        $stmt = mysqli_prepare($bdd, $requete);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssi", $nom, $prenom, $adresse_mail_contact, $sujet, $message, $idcontact);
            $result = mysqli_stmt_execute($stmt);
            
            if ($result) {
                echo '<script>alert("Modification réussie!")</script>';
                header("Refresh: 0; URL='gestion_contact.php'");
            } else {
                echo '<script>alert("Échec: ' . mysqli_error($bdd) . '")</script>';
            }

            mysqli_stmt_close($stmt);
        }
    }

    $select_query = "SELECT * FROM contact WHERE idcontact = $idcontact";
    $select_result = mysqli_query($bdd, $select_query);
    $update = mysqli_fetch_assoc($select_result);
}
?>


<form method="POST" class="formulaire">
    <input type="hidden" name="id" class="input" value="<?php echo $update['idcontact']; ?>">
    <input type="text" name="nom" class="input" value="<?php echo $update['nom']; ?>">
    <input type="text" name="prenom" class="input "value="<?php echo $update['prenom']; ?>">
    <input type="text" name="adresse_mail_contact" class="input" value="<?php echo $update['adresse_mail_contact']; ?>">
    <input type="text" name="sujet" class="input" value="<?php echo $update['sujet']; ?>">
    <input type="text" name="message" class="message" value="<?php echo $update['message']; ?>">
    <input type="submit" value="Valider">
</form>


</body>
</html>