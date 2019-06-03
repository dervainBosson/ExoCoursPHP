<?php
$title = "Nous Contacter";
require_once 'data/config.php';
require_once 'functions.php';
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)$_GET['jours'];
$creneaux = CRENEAUX[$jour];

$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'color : green' : 'color : red';
require 'elements/header.php';
?>

<div class="row">
    <div class="col-md-8">

        <h2>Nous contacter </h2>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus perferendis quos dolor accusamus!
            Reprehenderit quae ullam iure voluptatum aliquid facilis voluptate. Ducimus eaque adipisci ad,
            accusamus suscipit consequatur aspernatur odio?
        </p>

    </div>
    <div class="col-md-4">
        <?php if ($ouvert) : ?>
            <div class="alert alert-success">
                Le magasin est ouvert !
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin est fermé !
            </div>
        <?php endif ?>
        <h2>Horaires d'ouvertures</h2>
        <form method="get" action="">
            <div class="form-group">
                <label for="my-input">JOURS</label>
                <?= generateSelect('jours', $jour, JOURS ) ; ?>
            </div>
            <div class="form-group">
                <label for="my-input">HEURE</label>
                <input id="my-input" name='heure' class="form-control" value="<?= $heure ?>" type="number">
            </div>
            <button type="submit" class="btn btn-primary"> VERIFER</button>
        </form> <br>
        <ul>
            <?php foreach (JOURS as $key => $value) : ?>
                <li <?php if ($key + 1 === (int)date('N')) : ?> style="<?= $color ?>" <?php endif ?>>
                    <strong><?= $value ?></strong> :
                    <?= crenaux_html(CRENEAUX[$key]); ?>
                </li>
            <?php endforeach ?>

        </ul>
    </div>
</div>


<?php require 'elements/footer.php'; ?>