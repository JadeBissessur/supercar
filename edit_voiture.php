<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier - Voiture</title>
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
    $idvoiture = $_REQUEST['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $marque = $_POST["marque"];
        $modele = isset($_POST["modele"]) ? $_POST["modele"] : null;
        $annee = isset($_POST["annee"]) ? ($_POST["annee"] !== '') ? $_POST["annee"] : null : null;
        $prix = isset($_POST["prix"]) ? ($_POST["prix"] !== '') ? $_POST["prix"] : null : null;
        $description = isset($_POST["description"]) ? $_POST["description"] : null;
        $description1 = isset($_POST["description1"]) ? $_POST["description1"] : null;
        $image = isset($_POST["image"]) ? $_POST["image"] : null;

        // Use prepared statement to update the database
        $stmt = mysqli_prepare($bdd, "UPDATE voitures SET marque=?, modele=?, annee=?, prix=?, description1=?, description=?, image=? WHERE idvoiture=?");
        
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssddsssi", $marque, $modele, $annee, $prix, $description1, $description, $image, $idvoiture);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo '<script>alert("Modifications réussies !")</script>';
            header("Refresh: 0; URL='gestion_voiture.php'");
        } else {
            echo '<script>alert("Échec: ' . mysqli_error($bdd) . '")</script>';
        }

        mysqli_stmt_close($stmt);
    }

    $select_query = "SELECT * FROM voitures WHERE idvoiture = $idvoiture"; 
    $select_result = mysqli_query($bdd, $select_query);
    $update = mysqli_fetch_assoc($select_result);
}
?>


<form method="POST">
    <input type="hidden" name="id" class="input" value="<?php echo $update['idvoiture']; ?>">
    <input type="text" name="marque" class="input" value="<?php echo $update['marque']; ?>">
    <input type="text" name="modele" class="input" value="<?php echo $update['modele']; ?>">
    <input type="text" name="annee" class="input" value="<?php echo $update['annee']; ?>">
    <input type="text" name="prix" class="input" value="<?php echo $update['prix']; ?>">
    <input type="text" name="description1" class="input" value="<?php echo $update['description1']; ?>">
    <input type="text" name="description" class="message" value="<?php echo $update['description']; ?>">
    <input type="text" name="image" value="<?php echo $update['image']; ?>">
    <a href="gestion_voiture.php">
    <button type="submit">Valider</button>
</a>

</form>

</body>
</html>
