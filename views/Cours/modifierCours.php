<?php
require_once('../../models/etudiantService.php');
$etService = new etudiantService();
$cours = null;

// Vérifie si un ID de cours est passé et récupère les données
if (isset($_GET['idCours'])) {
    $idCours = $_GET['idCours'];
    $cours = $etService->getByIdCours($idCours);
    
    if (!$cours) {
        echo "Cours introuvable.";
        exit;
    }
}

// Récupérer toutes les options pour les listes déroulantes
$etudiants = $etService->getAllEtudiants(); // Assurez-vous que cette méthode existe
$enseignants = $etService->getAllEnseignants(); // Assurez-vous que cette méthode existe
$salles = $etService->getAllSalle(); // Assurez-vous que cette méthode existe

// Gestion de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCours = $_POST['idCours'];
    $matricule = $_POST['matricule'];
    $id = $_POST['id'];
    $idSalle = $_POST['idSalle'];
    
    $result = $etService->updateCours($idCours, $matricule, $id, $idSalle);

    if ($result) {
        header('Location:listeCours.php?message=Cours modifié avec succès');
    } else {
        echo "Erreur lors de la modification du cours.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Cours</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1>Modifier Cours</h1>
    <form method="POST" action="modifierCours.php">
        <input type="hidden" name="idCours" value="<?php echo $cours['idCours']; ?>">

        <!-- Liste déroulante pour l'Étudiant -->
        <label for="matricule">Étudiant</label>
        <select name="matricule" id="matricule" class="form-control">
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?php echo $etudiant['matricule']; ?>" <?php echo $etudiant['matricule'] == $cours['matricule'] ? 'selected' : ''; ?>>
                    <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Liste déroulante pour l'Enseignant -->
        <label for="id">Enseignant</label>
        <select name="id" id="id" class="form-control">
            <?php foreach ($enseignants as $enseignant): ?>
                <option value="<?php echo $enseignant['id']; ?>" <?php echo $enseignant['id'] == $cours['id'] ? 'selected' : ''; ?>>
                    <?php echo $enseignant['nom'] . ' ' . $enseignant['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Liste déroulante pour la Salle -->
        <label for="idSalle">Salle</label>
        <select name="idSalle" id="idSalle" class="form-control">
            <?php foreach ($salles as $salle): ?>
                <option value="<?php echo $salle['idSalle']; ?>" <?php echo $salle['idSalle'] == $cours['idSalle'] ? 'selected' : ''; ?>>
                    <?php echo $salle['num']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Enregistrer les modifications</button>
    </form>
</div>
</body>
</html>
