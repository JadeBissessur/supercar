<?php
include("bdconnect.php");
if (isset($_REQUEST['id'])) {
    $idvoiture = $_REQUEST['id'];

$requete = "DELETE FROM voitures WHERE idvoiture = ?";
$stmt = mysqli_prepare($bdd, $requete);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $idvoiture); 
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: gestion_voiture.php?");
        exit();
    } else {
        echo '<script>alert("Voiture introuvable ou échec de la suppression.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Echec : ' . mysqli_error($bdd) . '")</script>';
    exit();
}

}
?>