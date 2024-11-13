<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Salles</title>
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
    <h1 class="mt-4">Liste des Salles</h1>

    <!-- Affichage des messages de succès -->
    <?php if (isset($_GET['message'])) { ?>
        <div idSalle="message" class="alert alert-success"><?php echo $_GET['message']; ?></div>
        <script>hideMessage();</script> <!-- Appel de la fonction pour cacher le message -->
    <?php } ?>

    <!-- Lien pour ajouter un étudiant -->
    <a href="formSalles.php" class="btn btn-primary mb-3">Ajouter une salle</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>idSalle</th>
                <th>Numero de la salle</th>
                <th>Capacité de la salle</th>
                <th>Actions</th> <!-- Colonne des actions -->
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../../models/etudiantService.php');
            $enService = new etudiantService();
            $etudiants = $enService->getAllSalle();
?>
           
            <?php
            foreach ($etudiants as $en) {
                ?>
                <tr>
                    <td><?php echo $en['idSalle']; ?></td>
                    <td><?php echo $en['num']; ?></td>
                    <td><?php echo $en['nbre']; ?></td>
                    <td>
                        <!-- Lien pour modifier l'étudiant -->
                        <a href='modifierSalles.php?idSalle=<?php echo $en['idSalle']; ?>}' class='btn btn-warning btn-sm'>Modifier</a>
                        
                        <!-- Lien pour supprimer l'étudiant -->
                        <a href='deleteSalles.php?idSalle=<?php echo $en['idSalle']; ?>' class='btn btn-danger btn-sm' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet étudiant ?"\)'>Supprimer</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
