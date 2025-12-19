<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("PATH_PROJET", $_SERVER['DOCUMENT_ROOT'] . "/foad-php-entreprise");
define("WEB_ROOT", "/foad-php-entreprise");

function dg($data)
{
    echo '<pre style="background-color:black; color:white;padding: 1rem;">';
    var_dump($data);
    echo '</pre>';
}

function dd($data)
{
    echo '<pre style="background-color:black; color:white;padding: 1rem;">';
    var_dump($data);
    echo '</pre>';
    die();
}

// ==================
// === EMPLOYES ===
// ==================

function listerEmployes($pdo)
{
    $sql = "SELECT * FROM employes ORDER BY id_employes DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getEmploye($pdo, $idParam)
{
    $sql = "SELECT * FROM employes WHERE id_employes = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $idParam
    ]);
    return $stmt->fetch();
}

function ajoutEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire)
{
    $sql = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)
            VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':prenom'        => $prenom,
        ':nom'           => $nom,
        ':sexe'          => $sexe,
        ':service'       => $service,
        ':date_embauche' => $date_embauche,
        ':salaire'       => $salaire
    ]);
}

function updateEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire, $id)
{
    $sql = "UPDATE employes 
            SET prenom = :prenom,
                nom = :nom,
                sexe = :sexe,
                service = :service,
                date_embauche = :date_embauche,
                salaire = :salaire
            WHERE id_employes = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':prenom'        => $prenom,
        ':nom'           => $nom,
        ':sexe'          => $sexe,
        ':service'       => $service,
        ':date_embauche' => $date_embauche,
        ':salaire'       => $salaire,
        ':id'            => $id
    ]);
}

function supprimerEmploye($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM employes WHERE id_employes = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

// =============
// STATISTIQUES
// =============

function getNbLigneTable($pdo, $table)
{
    $sql = "SELECT COUNT(*) FROM `" . $table . "`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function getLastInsertId($pdo)
{
    $sql = "SELECT LAST_INSERT_ID()";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
}

function nettoyer($data)
{
    $data = trim($data);
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function createDatabase($pdo, $sqlfile)
{
    $query = file_get_contents($sqlfile);
    $pdo->exec($query);
}

function redirect($url)
{
    header("Location: " . WEB_ROOT . $url);
    exit;
}
