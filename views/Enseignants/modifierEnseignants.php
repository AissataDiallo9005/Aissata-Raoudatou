<?php
require_once('../../models/etudiantService.php');
$etService = new etudiantService();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $etudiants = $etService->getById($id);

    if (!$etudiants) {
        echo "Étudiant non trouvé.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $id= $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $matiere = $_POST['matiere'];

    $result = $etService->updateEnseignants( $id, $nom, $prenom, $tel, $email, $matiere);

    if ($result) {
        header('Location:listeEnseignants.php?message=Étudiant modifié avec succès');
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
    <title>Modifier Enseignants</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Modifier Enseignants</h1>
    <form action="modifierEnseignants.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $etudiants['id']; ?>">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $etudiants['nom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $etudiants['prenom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="number" class="form-control" id="tel" name="tel" value="<?php echo $etudiants['tel']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-MAIL :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $etudiants['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="matiere">Matière :</label>
            <input type="text" class="form-control" id="matiere" name="matiere" value="<?php echo $etudiants['matiere']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
    </form>
</div>
</body>
</html>
