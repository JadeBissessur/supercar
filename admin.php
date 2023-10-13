<?php

include("bdconnect.php");
session_start();

if (isset($_POST['utilisateur']) && isset($_POST['motdepasse'])) {
$utilisateur = $_POST["utilisateur"];
$motdepasse = $_POST["motdepasse"];

$requete = "SELECT utilisateur, motdepasse FROM admin WHERE utilisateur=? AND motdepasse=?";
$stmt = mysqli_prepare($bdd, $requete);
mysqli_stmt_bind_param($stmt, "ss", $utilisateur, $motdepasse);
mysqli_stmt_execute($stmt);

mysqli_stmt_store_result($stmt);
$num = mysqli_stmt_num_rows($stmt);



if ($num == 1) {
    $_SESSION["utilisateur"] = $utilisateur; 

    echo '<script>alert("Bonjour ' . $utilisateur . ' !")</script>';
    header("Refresh: 0; URL='admin_utilisateur.php'");

} else {
    echo '<script>alert("Le nom d\'utilisateur ou le mot de passe est incorrect.")</script>';
    header("Refresh: 0; URL='admin.php'");

}


mysqli_stmt_free_result($stmt);

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Admin - Connexion</title>

   <link rel="stylesheet" href="style/admin_css.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Se Connecter</h3>
      
      <input type="email" name="utilisateur" required placeholder="entrer votre email">
      <input type="password" name="motdepasse" required placeholder="entrer votre mot de passe">
      <input type="submit" name="submit" value="Se Connecter" class="form-btn">
   </form>

</div>

</body>
</html>