<?php
include dirname(__DIR__) . '/fonctions.php';
require dirname(__DIR__) . '/connexiondb.php'; 

$idEditEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEditEmploye)) {
    dd("Cet employé n'existe pas !!!");
}

$employe = getEmploye($pdo, $idEditEmploye);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    $prenom        = nettoyer($_POST['prenom']);
    $nom           = nettoyer($_POST['nom']);
    $sexe          = nettoyer($_POST['sexe']);
    $service       = nettoyer($_POST['service']);
    $date_embauche = $_POST['date_embauche'] ?? null;
    $salaire       = $_POST['salaire'] ?? null;

    updateEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire, $idEditEmploye);

    redirect('/employes/list-employe.php');
}

include PATH_PROJET . '/views/employes/edit-employe-view.php';
