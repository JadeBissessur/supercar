<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Evenement</title>
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
    $idevenement = $_REQUEST['id'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titre = $_POST["titre"];
        $soustitre = $_POST["soustitre"];
        $description_event = $_POST["description_event"];
        $description_info = $_POST["description_info"];
        $image = $_POST["image"];
    
        // Prepare the SQL statement
        $query = "UPDATE evenement SET titre=?, soustitre=?, description_event=?, description_info=?, image=? WHERE idevenement=?";
        $stmt = mysqli_prepare($bdd, $query);
    
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssssi", $titre, $soustitre, $description_event, $description_info, $image, $idevenement);
        $result = mysqli_stmt_execute($stmt);

        if ($query) {
            echo '<script>alert("Modification réussie !")</script>';
            header("Refresh: 0; URL='gestion_event.php'");
        } else {
            echo '<script>alert("Échec: ' . mysqli_error($bdd) . '")</script>';
        }
    }
    

    // Exécutez la requête SQL uniquement si l'ID est défini
    $select_query = "SELECT * FROM evenement WHERE idevenement = $idevenement";
    $select_result = mysqli_query($bdd, $select_query);
    $update = mysqli_fetch_assoc($select_result);
}
?>


<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" class="input" value="<?php echo $update['idevenement']; ?>">
    <input type="text" name="titre" class="input" value="<?php echo $update['titre']; ?>">
    <input type="text" name="soustitre" class="input" value="<?php echo $update['soustitre']; ?>">
    <input type="text" name="description_event" class="message" value="<?php echo $update['description_event']; ?>">
    <input type="text" name="description_info" class="input" value="<?php echo $update['description_info']; ?>">
    <input type="text" name="image" class="input" value="<?php echo $update['image']; ?>">


    <button type="submit" class="button">Valider</button>
</form>



</body>
</html>
