<?php

include("bdconnect.php");

session_start();
if(!isset($_SESSION['utilisateur'])){header('location:utilisateur.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin - Utilisateur</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style/admin_css.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Bonjour, <span>Admin</span></h3>
      <h1>Bienvenue <span><?php echo $_SESSION['utilisateur'] ?></span></h1>
      <p> que souhaitez vous faire ? </p>
      <a href="gestion_accueil.php" class="btn"> gestion accueil</a>
      <a href="gestion_essai.php" class="btn"> gestion demande d'essai</a>
      <a href="gestion_contact.php" class="btn">gestion contact </a>
      <a href="gestion_event.php" class="btn"> gestion evenement</a>
      <a href="gestion_voiture.php" class="btn"> gestion voiture</a>
      <a href="logout.php" class="btn"> deconnexion</a>
   </div>

</div>

</body>
</html>