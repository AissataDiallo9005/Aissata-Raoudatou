<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
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

         <h2 class="text-center mb-4">Ajouter un Cours</h2>

         <?php if (isset($_GET['message'])) { ?>
        <div id="message" class="alert alert-success"><?php echo $_GET['message']; ?></div>
        <script>hideMessage();</script> <!-- Appel de la fonction pour cacher le message -->
    <?php } ?>


    <a href="formCours.php" class="btn btn-primary">Ajouter un Cours</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>Enseignant</th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../../models/etudiantService.php');
            $etService = new etudiantService();
            $coursList = $etService->getAllCours();
            ?>
            <?php
            foreach ($coursList as $cours) {
                ?>
                <tr>
                    <td><?php echo $cours['idCours']; ?></td>
                    <td><?php echo $cours['Nom']; ?></td>
                    <td><?php echo $cours['Num']; ?></td>
                    <td><?php echo $cours['Numero']; ?></td>
                    <td>
                        <a href='modifierCours.php?idCours=<?php echo $cours['idCours']; ?>' class='btn btn-warning'>Modifier</a>
                        <a href='deleteCours.php?idCours=<?php echo $cours['idCours']; ?>' class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce cour ?"\)'>Supprimer</a>
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
