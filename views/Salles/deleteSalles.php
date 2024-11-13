<?php
require_once('../../models/etudiantService.php');

if (isset($_GET['idSalle'])) {
    $idSalle = $_GET['idSalle'];
    $etService = new etudiantService();

    $result = $etService->deleteSalle($idSalle);

    if ($result) {
        header('Location: listeSalles.php?message=Salle supprimé avec succès');
    } else {
        echo "Erreur lors de la suppression de l'étudiant.";
    }
} else {
    echo "Matricule non spécifié.";
}
?>