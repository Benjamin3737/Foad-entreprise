<?php
include 'fonctions.php';
require 'connexiondb.php';

$titleEntreprise = "Page d'accueil de l'entreprise";
require PATH_PROJET . '/views/partials/header.php';
?>

<p>Nombre d'employés : <?= getNbLigneTable($pdo, 'employes') ?></p>

<?php require PATH_PROJET . '/views/partials/footer.php'; ?>
