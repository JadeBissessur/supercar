<?php
include("bdconnect.php");
if (isset($_REQUEST['id'])) {
    $idcontact = $_REQUEST['id'];

$requete = "DELETE FROM contact WHERE idcontact = ?";
$stmt = mysqli_prepare($bdd, $requete);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $idcontact); 
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("Location: gestion_contact.php?");
        exit();
    } else {
        echo '<script>alert("Contact introuvable ou échec de la suppression.")</script>';
        exit();
    }
} else {
    echo '<script>alert("Error preparing SQL statement: ' . mysqli_error($bdd) . '")</script>';
    exit();
}

}
?>
