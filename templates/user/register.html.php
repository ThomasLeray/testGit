<h1>Enregistrement</h1>
<?php if ($success) : ?>
    <p>Compte créé avec succès !</p>
<?php endif; ?>
<form method="POST">
    <div>
        <label>nom</label>
        <input type="text" name="nom" value="<?= $user->getNom(); ?>">
    </div>
    <div>
        <label>prenom</label>
        <input type="text" name="prenom" value="<?= $user->getPrenom(); ?>">
    </div>
    <div>
        <label>Login</label>
        <input type="text" name="login" value="<?= $user->getLogin(); ?>">
    </div>
    <div>
        <label>Mot de passe</label>
        <input type="password" name="password">
    </div>
    <div>
        <label>groupe TD</label>
        <input type="number" name="td" value="<?= $user->getTD(); ?>">
    </div>
    <input type="submit" value="Créer">
</form>
<a href="/">Retour</a>