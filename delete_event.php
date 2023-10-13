<?php
include("bdconnect.php");
if (isset($_REQUEST['id'])) {
    $idevenement = $_REQUEST['id'];

$requete = "DELETE FROM evenement WHERE idevenement = ?";
$stmt = mysqli_prepare($bdd, $requete);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $idevenement); 
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: gestion_event.php?");
        exit();
    } else {
        echo '<script>alert("Événement introuvable ou échec de la suppression.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Echec : ' . mysqli_error($bdd) . '")</script>';
    exit();
}

}
?>