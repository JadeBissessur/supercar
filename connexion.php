<?php 

$host='localhost';
$login="root";
$pass="";

$bd1= mysqli_connect($host,$login,$pass,"supercar");

if (mysqli_connect_errno()) {
    echo "Connexion impossible avec le SGBD=> MySQL : " .mysqli_connect_error();

}

mysqli_set_charset($bd1,"utf8");
?>