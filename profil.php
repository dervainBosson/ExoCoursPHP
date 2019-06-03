<?php
$name = null;
if (!empty($_GET['action'] && $_GET['action'] === 'deconnecter')) {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
if (!empty($_COOKIE['utilisateur'])) {
    $name = $_COOKIE['utilisateur'];
}

if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $name = $_POST['nom'];
}
require 'elements/header.php'; ?>

<div class="row">
    <?php if($name): ?>
    <h1>Bonjour <?= htmlentities($name); ?></h1>
    <a href="profil.php?action=deconnecter">Se déconnecter</a>
    <?php else:?>
        <div class="col-md-8">
            <form method="post" action="">
                <div class="form-group">
                    <label for="nom">Votre Nom</label>
                    <input id="nom" name='nom' class="form-control" type="text">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    <?php endif;?>
</div>

<?php require 'elements/footer.php'; ?>