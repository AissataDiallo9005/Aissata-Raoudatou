<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire Ajout Salle</title>
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
                        <li><a href="../Etudiants/form.php">Étudiants</a></li>
                        <li><a href="../Enseignants/formEnseignants.php">Enseignants</a></li>
                        <li><a href="../Cours/formCours.php">Cours</a></li>
                        <li class="active"><a href="#">Salles</a></li>
                        <li><a href="../deconnexion.php">Deconnexion</a></li>
                    </ul>    
                        
                        
</div>
</nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Formulaire Ajout Salle</h2>
        <div class="form-container">
        <a href="listeSalles.php" class="btn btn-primary mb-3">Voir la liste des salles</a>
            <form action="../../controllers/etudiantCtrl.php" method="POST">
                <input type="hidden" name="action" value="aller">
                <div class="form-group">
                    <label for="num">Numéro de la Salle</label>
                    <input type="number" class="form-control" id="num" name="num" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nbre">Capacité de la salle </label>
                    <input type="number" class="form-control" id="nbre" name="nbre" required autocomplete="off">
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
