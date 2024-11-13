<?php
require_once('../../models/etudiantService.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $etService = new etudiantService();

    $result = $etService->deleteEnseignant($id);

    if ($result) {
        header('Location: listeEnseignants.php?message=Étudiant supprimé avec succès');
    } else {
        echo "Erreur lors de la suppression de l'étudiant.";
    }
} else {
    echo "Matricule non spécifié.";
}
?>
