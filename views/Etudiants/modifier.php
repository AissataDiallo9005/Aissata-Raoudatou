<?php
require_once('../../models/etudiantService.php');

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];
    $etService = new etudiantService();
    $etudiant = $etService->getByMatricule($matricule);

    if (!$etudiant) {
        echo "Étudiant non trouvé.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $date_naiss = $_POST['date_naiss'];

    $result = $etService->updateEtudiant($matricule, $nom, $prenom, $sexe, $tel, $email, $date_naiss);

    if ($result) {
        header('Location: liste.php?message=Étudiant modifié avec succès');
    } else {
        echo "Erreur lors de la modification de l'étudiant.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Modifier Étudiant</h1>
    <form method="POST">
        <input type="hidden" name="matricule" value="<?php echo $etudiant['matricule']; ?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $etudiant['nom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $etudiant['prenom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="M" <?php echo ($etudiant['sexe'] == 'M') ? 'selected' : ''; ?>>Masculin</option>
                <option value="F" <?php echo ($etudiant['sexe'] == 'F') ? 'selected' : ''; ?>>Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="number" class="form-control" id="tel" name="tel" value="<?php echo $etudiant['tel']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tel">E-MAIL :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $etudiant['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date_naiss">Date de naissance :</label>
            <input type="date" class="form-control" id="date_naiss" name="date_naiss" value="<?php echo $etudiant['date_naiss']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
    </form>
</div>
</body>
</html>
