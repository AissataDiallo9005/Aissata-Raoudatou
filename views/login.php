<?php 
require_once("../models/Provider.php");
session_start();
extract($_POST);
echo $compte, $motpasse;

if ($_POST['access'] == '1') {
    $provider = new Provider();
    $con = $provider->getConnection(); 
    if ($con) {
        $v = $con->prepare("SELECT compte, motpasse FROM utilisateurs WHERE compte = ? AND motpasse = ?");
        $v->execute([$compte, $motpasse]);
        $tabv = $v->fetch();

        if ($tabv['compte'] == $compte && $tabv['motpasse'] == $motpasse) {
            $_SESSION['cmp'] = $compte;
            header("Location: Etudiants/form.php");
        } else {
            header("Location: authent.php?msg=1");
        }
    } else {

        echo "Erreur de connexion à la base de données.";
    }
}
?>
