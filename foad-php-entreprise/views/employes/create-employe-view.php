<?php 
$titleEntreprise = "Créer un employé";
require PATH_PROJET . '/views/partials/header.php'; 
?>

<h1>Créer un employé</h1>

<form action="" method="POST">
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>" required>
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
    </div>
    <div>
        <label for="sexe">Sexe</label>
        <select name="sexe" required>
            <option value="m" <?= (($_POST['sexe'] ?? '')=='m')?'selected':'' ?>>Homme</option>
            <option value="f" <?= (($_POST['sexe'] ?? '')=='f')?'selected':'' ?>>Femme</option>
        </select>
    </div>
    <div>
        <label for="service">Service</label>
        <input type="text" name="service" value="<?= $_POST['service'] ?? '' ?>">
    </div>
    <div>
        <label for="date_embauche">Date d'embauche</label>
        <input type="date" name="date_embauche" value="<?= $_POST['date_embauche'] ?? '' ?>">
    </div>
    <div>
        <label for="salaire">Salaire</label>
        <input type="number" step="0.01" name="salaire" value="<?= $_POST['salaire'] ?? '' ?>">
    </div>
    <div>
        <button type="submit" name="envoyer">Créer l'employé</button>
    </div>               
</form>

<?php require PATH_PROJET . '/views/partials/footer.php'; ?>
