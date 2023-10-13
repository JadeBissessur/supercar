<?php

$host = "localhost";
$login = "root";
$pass = "";
$bdname = "supercar";

$bdd = mysqli_connect($host, $login, $pass, $bdname);

if ($bdd)

{
    echo "Connexion reussie a MYSQL";
}

else

    {
        echo "Connexion non-reussite";
    }

mysqli_set_charset($bdd,"utf8");
?>