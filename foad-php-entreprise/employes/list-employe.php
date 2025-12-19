<?php
include dirname(__DIR__) . '/fonctions.php';
require dirname(__DIR__) . '/connexiondb.php';

$employesArray = listerEmployes($pdo);

include PATH_PROJET . '/views/employes/list-employe-view.php';
