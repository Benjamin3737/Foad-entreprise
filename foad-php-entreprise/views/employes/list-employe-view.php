<?php
$titleEntreprise = "Liste des employés";
require PATH_PROJET . '/views/partials/header.php';

if (count($employesArray) === 0) :
    echo '<h3>Aucun employé !</h3>';
    echo '<a href="' . WEB_ROOT . '/employes/create.php" role="button">Ajouter un employé</a>';
    die();
endif;
?>

<h1>Liste des employés</h1>
<a href="<?= WEB_ROOT . '/employes/create-employe.php' ?>" role="button">Ajouter un employé</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Sexe</th>
            <th>Service</th>
            <th>Date embauche</th>
            <th>Salaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employesArray as $employe) : ?>
        <tr>
            <td><?= $employe['id_employes']; ?></td>
            <td><?= htmlspecialchars($employe['prenom']); ?></td>
            <td><?= htmlspecialchars($employe['nom']); ?></td>
            <td><?= $employe['sexe']; ?></td>
            <td><?= htmlspecialchars($employe['service']); ?></td>
            <td><?= $employe['date_embauche']; ?></td>
            <td><?= $employe['salaire']; ?></td>
            <td>
                <a href="<?= WEB_ROOT . '/employes/edit-employe.php?id=' . $employe['id_employes'] ?>" role="button">Éditer</a>
                <a href="<?= WEB_ROOT . '/employes/del-employe.php?id=' . $employe['id_employes'] ?>" role="button" onclick="return confirm('Êtes-vous certain de vouloir supprimer cet employé ?');">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require PATH_PROJET . '/views/partials/footer.php'; ?>
