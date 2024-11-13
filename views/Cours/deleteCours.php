<?php
require_once('../../models/etudiantService.php');
$etService = new etudiantService();

if (isset($_GET['idCours'])) {
    $idCours = $_GET['idCours'];
    $result = $etService->deleteCours($idCours);
    if ($result) {
        header("Location: listeCours.php?message=Cours supprimé avec succès");
} else {
    echo "Erreur lors de la suppression du cours.";
}
} else {
    echo "Matricule non spécifié.";
}
?>
