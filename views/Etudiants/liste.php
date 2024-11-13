<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script>
        // Fonction pour masquer les messages après un certain temps
        function hideMessage() {
            var messageDiv = document.getElementById('message');
            if (messageDiv) {
                setTimeout(function() {
                    messageDiv.style.display = 'none';
                }, 5000); 
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Liste des étudiants</h1>

    <!-- Affichage des messages de succès -->
    <?php if (isset($_GET['message'])) { ?>
        <div id="message" class="alert alert-success"><?php echo $_GET['message']; ?></div>
        <script>hideMessage();</script> <!-- Appel de la fonction pour cacher le message -->
    <?php } ?>

    <!-- Lien pour ajouter un étudiant -->
    <a href="form.php" class="btn btn-primary mb-3">Ajouter un étudiant</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Téléphone</th>
                <th>E-MAIL</th>
                <th>Date de naissance</th>
                <th>Actions</th> <!-- Colonne des actions -->
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../../models/etudiantService.php');
            $etService = new etudiantService();
            $etudiants = $etService->getAllEtudiants();

            // Pour chaque étudiant, on crée une ligne avec ses informations
            foreach ($etudiants as $et) {
                echo "<tr>
                    <td>{$et['matricule']}</td>
                    <td>{$et['nom']}</td>
                    <td>{$et['prenom']}</td>
                    <td>{$et['sexe']}</td>
                    <td>{$et['tel']}</td>
                    <td>{$et['email']}</td>
                    <td>{$et['date_naiss']}</td>
                    <td>
                        <!-- Lien pour modifier l'étudiant -->
                        <a href='modifier.php?matricule={$et['matricule']}' class='btn btn-warning btn-sm'>Modifier</a>
                        
                        <!-- Lien pour supprimer l'étudiant -->
                        <a href='supprimer.php?matricule={$et['matricule']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet étudiant ?\")'>Supprimer</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
