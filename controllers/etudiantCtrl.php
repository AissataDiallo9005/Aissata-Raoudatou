<?php
require_once('../models/etudiantService.php');

$etService = new etudiantService();


if (isset($_POST['action']) && $_POST['action'] == 'ajout') {
    $matricule = $_POST['mat'];
    $nom = $_POST['nm'];
    $prenom = $_POST['pr'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $date_naiss = $_POST['dat'];
    $email = $_POST['email'];

    $result = $etService->add($matricule, $nom, $prenom, $sexe, $tel, $email, $date_naiss);

    if ($result) {
        header('Location: ../views/Etudiants/liste.php?message=Etudiant ajouté');
    } else {
        echo "Erreur lors de l'ajout de l'étudiant.";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'ajoute') {
    $nom = $_POST['nm'];
    $prenom = $_POST['pr'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $matiere = $_POST['mat'];

    var_dump($nom, $prenom, $tel, $email, $matiere);

    $result = $etService->addEnseignants($nom, $prenom, $tel, $email, $matiere);

    if ($result) {
        header('Location: ../views/Enseignants/listeEnseignants.php?message=Enseignant ajouté');
    } else {
        echo "Erreur lors de l'ajout de l'Enseignant.";
    }
}

var_dump($_POST);  // Ajoute cette ligne pour inspecter les données envoyées
if (isset($_POST['action']) && $_POST['action'] == 'aller') {
    if (isset($_POST['num']) && isset($_POST['nbre']) && !empty($_POST['num']) && !empty($_POST['nbre'])) {
        $num = $_POST['num'];
        $nbre = $_POST['nbre'];
        
        $result = $etService->addSalle($num, $nbre);
        if ($result) {
            header('Location: ../views/Salles/listeSalles.php?message=Salle ajoutée');
        } else {
            echo "Erreur lors de l'ajout de la salle.";
        }
    } else {
        echo "Les informations 'num' et 'nb' sont manquantes ou vides.";
    }
}

// Ajouter un cours
var_dump($_POST);
if (isset($_POST['action']) && $_POST['action'] == 'addCours') {
    if (isset($_POST['matricule']) && isset($_POST['id']) && isset($_POST['idSalle'])) {
        $matricule = $_POST['matricule'];
        $id = $_POST['id'];  // Utilise 'id' au lieu de 'idEnseignant'
        $idSalle = $_POST['idSalle'];
        
        $result = $etService->addCours($matricule, $id, $idSalle);
        
        if ($result) {
            header("Location: ../views/cours/listeCours.php?message=Cours ajouté avec succès");
        } else {
            echo "Erreur lors de l'ajout du cours.";
        }
    } else {
        echo "Les informations 'matricule', 'id' et 'idSalle' sont manquantes ou vides.";
    }  

}


?>

