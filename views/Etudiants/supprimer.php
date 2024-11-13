<?php
require_once('../../models/etudiantService.php');

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    $etService = new etudiantService();

    $result = $etService->deleteEtudiant($matricule);

    if ($result) {
        header('Location: liste.php?message=Étudiant supprimé avec succès');
    } else {
        echo "Erreur lors de la suppression de l'étudiant.";
    }
} else {
    echo "Matricule non spécifié.";
}
?>
