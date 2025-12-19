<?php
include dirname(__DIR__) . '/fonctions.php';
require dirname(__DIR__) . '/connexiondb.php';

// =================================================
// Traitement du formulaire de création d'un employé
// =================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    $prenom        = nettoyer($_POST['prenom']);
    $nom           = nettoyer($_POST['nom']);
    $sexe          = nettoyer($_POST['sexe']);
    $service       = nettoyer($_POST['service']);
    $date_embauche = $_POST['date_embauche'] ?? null;
    $salaire       = $_POST['salaire'] ?? null;

    ajoutEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire);

    $employeInserted = getLastInsertId($pdo);

    if ($employeInserted) {
        redirect('/employes/list-employe.php');
    }
}

include PATH_PROJET . '/views/employes/create-employe-view.php';
