<?php
include dirname(__DIR__) . '/fonctions.php';
require dirname(__DIR__) . '/connexiondb.php'; 

$idSuppEmploye = $_GET['id'] ?? null;

if (!is_numeric($idSuppEmploye)) {
    dd("Cet employé n'existe pas !!!");
}

$suppResultEmploye = supprimerEmploye($pdo, $idSuppEmploye);

if ($suppResultEmploye) {
    redirect('/employes/list-employe.php');
}
