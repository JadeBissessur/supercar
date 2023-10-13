<!DOCTYPE html>
  <html lang="fr">
  
  <head>
      <link rel="stylesheet" type="text/css" href="style/voiture_infos_style.css">
      <link rel="stylesheet" type="text/css" href="style/header_css.css">
      <link rel="stylesheet" type="text/css" href="style/footer_css.css">
      <meta charset="UTF-8">
      <title> Voiture </title>
  
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
                    <li>
                        <form method="POST" action="search.php">
                            <div class="box">
                                <input class="input-menu" type="text" placeholder="Que cherchez-vous?">
                            </div>
                        </form>
                    </li>
                    <li><a href="supercar_voiture.php">Nos voitures</a></li>
				<li><a href="supercar_essai.php">Essai</a></li>
				<li><a href="supercar_evenement.php">Evenements</a></li>
				<li><a href="supercar_contact.php"> Contactez-nous</a></li>
                </ul>
            </nav>
            <?php
                    session_start();

                    if(isset($_SESSION['nom_utilisateur'])) {
                        $nom_utilisateur = $_SESSION['nom_utilisateur'];
                        echo " <a href='supercar_connexion.php' class='menu-icon'> $nom_utilisateur </a>";
                        } else {
                            echo "<a href='supercar_connexion.php'><img src='images/icon.png' class='menu-icon'> </a>";                        
                        }

                ?>        
                </div>
    </div>
</header>


 <?php 


    include("bdconnect.php");

    $id = $_GET['idvoiture'];
    $requete = "SELECT marque, modele, annee, image, description, prix FROM voitures WHERE idvoiture = $id";
    $result = mysqli_query($bdd, $requete);
    $car = mysqli_fetch_assoc($result);
  
      echo '<div class="container-product">';
      echo '<div class="presentation-vehicule">';
      echo '<img class="img-vehicule" name="image_vehicule" src="'.$car['image'].'">';
      echo '</div>';
      echo '<div class="details">';
      echo '<div class="content">';
      echo '<h2 class="h2-vehicule" name="marque">'. $car['marque'].' <br>';
      echo '<span class="span-h2" name="modele">'. $car['modele'] .'</span>';
      echo '&nbsp;<span class="span-h2" name="annee">'. $car['annee'] .'</span>';
      echo '</h2>';
      echo '<p class="description" name="description">'. $car['description'] .'</p>';
      echo '<h3 class="h3-vehicule" name="prix">'. $car['prix'] . ' € </h3>';
      echo '<a class="a-vehicule" href="supercar_essai.php"> ';
      echo '<button class="button-reservation"> Reserver maintenant </button>';
      echo '</a>';
      echo '</div>';
      echo '</div>';
      echo '</div>';

  ?>

<?php

  echo '<style>';
  echo '.presentation-vehicule:before {';
  echo 'content: \'' . $car['marque'] . '\';'; // Use the value of $car['marque'] as the content
  echo 'position: absolute;';
  echo 'top: 0px;';
  echo 'left: 24px;';
  echo 'color: #000;';
  echo 'opacity: 0.2;';
  echo 'font-size: 8em;';
  echo 'font-weight: 800;';
  echo '}';
  echo '</style>';
?>
  
<!-- Footer de la page -->

<footer class="footer-distributed">
  
  <div class="footer-left">
    <a href="supercar_accueil.php">
      <h3>SUPER<span>CAR</span></h3>
    </a>

      <p class="footer-links">
          <a href="supercar_voiture.php"> Nos voitures </a>
          |
          <a href="supercar_essai.php"> Essai </a>
          |
          <a href="supercar_evenement.php"> Évènements </a>
          |
          <a href="supercar_contact.php"> Contactez-nous </a>
      </p>

      <p class="footer-company-name">Copyright © 2023 <strong>SUPERCAR</strong> Tous droits réservés </p>
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
