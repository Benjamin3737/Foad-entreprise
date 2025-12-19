<?php 
$titleEntreprise = "Édition d'un employé";
require PATH_PROJET . '/views/partials/header.php'; 
?>

<h1>Éditer un employé</h1>

<form action="?id=<?= $employe['id_employes']; ?>" method="POST">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($employe['prenom']); ?>" required>
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($employe['nom']); ?>" required>
    </div>
    <div>
        <label for="sexe">Sexe</label>
        <select name="sexe" required>
            <option value="m" <?= $employe['sexe']=='m'?'selected':'' ?>>Homme</option>
            <option value="f" <?= $employe['sexe']=='f'?'selected':'' ?>>Femme</option>
        </select>
    </div>
    <div>
        <label for="service">Service</label>
        <input type="text" name="service" value="<?= htmlspecialchars($employe['service']); ?>">
    </div>
    <div>
        <label for="date_embauche">Date d'embauche</label>
        <input type="date" name="date_embauche" value="<?= $employe['date_embauche']; ?>">
    </div>
    <div>
        <label for="salaire">Salaire</label>
        <input type="number" step="0.01" name="salaire" value="<?= $employe['salaire']; ?>">
    </div>
    <div>
        <button type="submit" name="envoyer">Éditer l'employé</button>
    </div>               
</form>

<?php require PATH_PROJET . '/views/partials/footer.php'; ?>
