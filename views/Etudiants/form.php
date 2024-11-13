<?php
session_start();
if (empty($_SESSION['cmp'])) {
    header("location:../authent.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire Ajout Étudiant</title>
    <!-- Lien vers le CSS Bootstrap -->
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
</head>
<body>
    <!-- Barre de navigation -->
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
                        <li class="active"><a href="#">Étudiants</a></li>
                        <li><a href="../Enseignants/formEnseignants.php">Enseignants</a></li>
                        <li><a href="../Cours/formCours.php">Cours</a></li>
                        <li><a href="../Salles/formSalles.php">Salles</a></li>
                        <li><a href="../deconnexion.php">Deconnexion</a></li>
                    </ul>    
                        
                        
</div>
</nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulaire d'Ajout Étudiant</h2>
        <div class="form-container">
        <a href="liste.php" class="btn btn-primary mb-3">Voir la liste des étudiants</a>
            <form action="../../controllers/etudiantCtrl.php" method="POST">
                <input type="hidden" name="action" value="ajout">
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" name="mat" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nm" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="pr" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="tel">Numéro</label>
                    <input type="number" class="form-control" id="tel" name="tel" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="date_naiss">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Sexe</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="homme" value="H" required>
                        <label class="form-check-label" for="homme">Homme</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="femme" value="F" required>
                        <label class="form-check-label" for="femme">Femme</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_naiss">Date de Naissance</label>
                    <input type="date" class="form-control" id="date_naiss" name="dat" required autocomplete="off">
                </div>
                <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-sm">Ajouter </button>
                <button type="reset" class="btn btn-danger ml-3">Vider</button>

                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Script JS Bootstrap -->
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>