<!DOCTYPE HTML>
  <html lang="fr">
  
  <head>
    <link rel="stylesheet" type="text/css" href="style/evenement_infos.css">
      <link rel="stylesheet" type="text/css" href="style/header_css.css">
      <link rel="stylesheet" type="text/css" href="style/footer_css.css">
      <meta charset="UTF-8">

      <title> Informations </title>
  
  </head>

<body>

	<!-- Header de la page -->

	<header>
    <div class="container">
        <div class="navbar">
        <a href="supercar_accueil.php">
            <img src="images/logo.png" alt="SuperCar logo" class="logo">
        </a>        
		<nav>
        <ul>
		<li><a href="supercar_voiture.php">Nos voitures</a></li>
				<li><a href="supercar_essai.php">Essai</a></li>
				<li><a href="supercar_evenement.php">Évènements</a></li>
				<li><a href="supercar_contact.php"> Contactez-nous</a></li>
        </ul>
        </nav>
        <a href="supercar_connexion.php"><img src="images/icon.png" class="menu-icon"></a>
        </div>
    </div>
    </header>

 <?php 

  session_start();

    include("bdconnect.php");

    $id = $_GET['idevenement'];
    $requete = "SELECT titre, soustitre, image, description_info FROM evenement WHERE idevenement = $id";
    $result = mysqli_query($bdd, $requete);
    $event = mysqli_fetch_assoc($result);
  
    echo '<table class="container-product">';
    echo '<tr>';
    echo '<td>';
    echo '<img class="image-event" name="image" src="'.$event['image'].'">';
    echo '</td>';
    echo '<td class="content">';
    echo '<h2 class="titre" name="titre">'. $event['titre'].' <br>';
    echo '<span class="sous-titre" name="soustitre">'. $event['soustitre'] .'</span>';
    echo '</h2>';
    echo '<p class="description" name="description_info">'. $event['description_info'] .'</p>';
    echo '<a class="a-vehicule" href="supercar_evenement.php"> ';
    echo '<button class="button-reservation"> Retour a la page </button>';
    echo '</a>';
    echo '</td>';
    echo '</table>';

  ?>
  
<!-- Footer de la page -->

<footer class="footer-distributed">

<div class="footer-left">
    <h3>SUPER<span>CAR</span></h3>

    <p class="footer-links">
        <a href="#">Home</a>
        |
        <a href="#">About</a>
        |
        <a href="#">Contact</a>
    </p>

    <p class="footer-company-name">Copyright © 2023 <strong>SUPERCAR</strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <img src="logos/localisation.png">
        <p><span>MCCI Business School,</span>
            Ebene, Mauritius</p>
    </div><br>

    <div>
        <i class="fa fa-phone"></i>
        <img src="logos/whatsapp.png">
        <p>+230 1234 5678</p>
    </div><br>

    <div>
        <i class="fa fa-envelope"></i>
        <img src="logos/logo_mail.png">
        <p><a href="mailto:supercar2023@gmail.com">supercar2023@gmail.com</a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
        <span>Notre Equipe</span>
        Ce projet <strong>SUPERCAR</strong> à été réalisé par Maeva Dorasamy,
        Jade Bissessur et Elisee L'aiguille. Classe de BTS SIO 2022-24
    </p>
</div>
</footer>


</body>
</html>
