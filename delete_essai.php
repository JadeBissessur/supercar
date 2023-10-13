<?php
include("bdconnect.php");
if (isset($_REQUEST['id'])) {
    $idessai = $_REQUEST['id'];

$requete = "DELETE FROM demande_essai WHERE idessai = ?";
$stmt = mysqli_prepare($bdd, $requete);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $idessai); 
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: gestion_essai.php?");
        exit();
    } else {
        echo '<script>alert("Demande d\'essai introuvable ou échec de la suppression.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Echec : ' . mysqli_error($bdd) . '")</script>';
    exit();
}

}
?>