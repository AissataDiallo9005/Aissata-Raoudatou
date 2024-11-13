<?php
require_once('../../models/etudiantService.php');

if (isset($_GET['idSalle'])) {
    $idSalle= $_GET['idSalle'];
    $etService = new etudiantService();
    $etudiant = $etService->getByIdSalle($idSalle);

    if (!$etudiant) {
        echo "Étudiant non trouvé.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $num = $_POST['num'];
    $nbre = $_POST['nbre'];
    
    $result = $etService->updateSalle($idSalle, $num, $nbre);

    if ($result) {
        header('Location: listeSalles.php?message=Étudiant modifié avec succès');
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
    <title>Modifier Salle</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Modifier Salle</h1>
    <form method="POST">
        <input type="hidden" name="idSalle" value="<?php echo $etudiant['idSalle']; ?>">
        <div class="form-group">
            <label for="num">Numéro de la Salle :</label>
            <input type="number" class="form-control" id="num" name="num" value="<?php echo $etudiant['num']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nbre">Capacité de la salle :</label>
            <input type="number" class="form-control" id="nbre" name="nbre" value="<?php echo $etudiant['nbre']; ?>" required>

        <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
    </form>
</div>
</body>
</html>
