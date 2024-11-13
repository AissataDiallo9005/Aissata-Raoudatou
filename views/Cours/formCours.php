<?php
require_once '../../models/etudiantService.php';

$etudiantService = new etudiantService();

$enseignants = $etudiantService->getAllEnseignants();
$etudiants = $etudiantService->getAllEtudiants();
$salles = $etudiantService->getAllSalle();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter un Cours</title>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
<style>
    /* Personnalisation du menu */
    .navbar {
        background-color: #000;
    }
    .navbar-brand, .nav-link {
        color: #fff !important;
    }
    .navbar-nav .nav-item.active .nav-link {
        background-color: #444 !important;
    }

    /* Personnalisation du formulaire */
    .form-container {
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 600px;
        margin: 0 auto;
    }
    .form-control {
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .form-group label {
        font-weight: bold;
    }
    .btn-custom {
        background-color: #343a40;
        color: white;
        border-radius: 5px;
        border: none;
    }
    .btn-custom:hover {
        background-color: #495057;
    }
</style>
<body>
<div class="container">
<div class="row">
        <div class="col-md-10">
    <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="sr-only">MENU</span>
                </button>
            <a class="navbar-brand" href="#">MENU</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="../Etudiants/form.php">Étudiants</a></li>
                    <li><a href="../Enseignants/formEnseignants.php">Enseignants</a></li>
                    <li class="active"><a href="#">Cours</a></li>
                    <li><a href="../Salles/formSalles.php">Salles</a></li>
                    <li><a href="../deconnexion.php">Deconnexion</a></li>
                </ul>
            </div>
        </nav>
<div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un Cours</h2>
    <div class="form-container">
    <a href="listeCours.php" class="btn btn-primary mb-3">Voir la liste des Cours</a>
    <form action="../../controllers/etudiantCtrl.php" method="POST">
    <input type="hidden" name="action" value="addCours">
        <!-- Liste déroulante des enseignants -->
        <div class="form-group">
            <label for="id">Enseignant :</label>
            <select name="id" id="id" class="form-control">
            <option value=""> Sélectionner un enseignant </option>
                <?php foreach ($enseignants as $enseignant): ?>
                    <option value="<?= $enseignant['id'] ?>"><?= $enseignant['nom'] . ' ' . $enseignant['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Liste déroulante des étudiants -->
        <div class="form-group">
            <label for="matricule">Étudiant :</label>
            <select name="matricule" id="matricule" class="form-control">
            <option value="" disabled selected> Sélectionner un étudiant </option>
                <?php foreach ($etudiants as $etudiant): ?>
                    <option value="<?= $etudiant['matricule'] ?>"><?= $etudiant['nom'] . ' ' . $etudiant['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Liste déroulante des salles -->
        <div class="form-group">
            <label for="idSalle">Salle :</label>
            <select name="idSalle" id="idSalle" class="form-control">
            <option value="" disabled selected> Sélectionner une salle </option>
                <?php foreach ($salles as $salle): ?>
                    <option value="<?= $salle['idSalle'] ?>"><?= $salle['num'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-success btn-sm">Ajouter</button>
        <button type="reset" class="btn btn-danger ml-3">Vider</button>

    </form>
    </div>
</div>
</div>
</body>
</html>