<?php
require "functions/auth.php";
check_connexion();
require 'functions/compteur.php';
require_once 'functions.php';
$annee = (int)date('Y');
$get_annee = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$get_mois = empty($_GET['mois']) ? null : $_GET['mois'];
if ($get_annee && $get_mois) {
    $total = afficher_nombre_vue_mois($get_annee, $get_mois);
    $details = afficher_details_nombre_vue_mois($get_annee, $get_mois);
} else {
    $total = afficher_nombre_vues();
}
$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre',
];
$title = "Dashboard";
require "elements/header.php" ?>


<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <a href="dashboard.php?annee=<?= $annee - $i; ?>" class="list-group-item <?= $get_annee === $annee - $i ? 'active' : '' ?>"> <?= $annee - $i; ?></a>
                <?php if ($get_annee === $annee - $i) : ?>
                    <div class="list-group">
                        <?php foreach ($mois as $k => $value) : ?>
                            <a class="list-group-item <?= $k === $get_mois ? 'active' : '' ?>" href="dashboard.php?annee=<?= $get_annee ?>&mois=<?= $k ?>">
                                <?= $value; ?>
                            </a>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        
            <div class="card mb-4">
                <div class="card-body">
                    <strong style="font-size:3em;"><?= $total; ?></strong><br />
                    Visite<?= $total > 1 ? 's' : '' ?> total
                </div>
            </div>
            <?php if(isset($details)): ?>
            <h2>Detail des visites pour le mois</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Jour</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($details as $detail) : ?>
                        <tr>
                            <td><?= $detail['jour'] ?></td>
                            <td><?= $detail['visites'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php endif ?>
        </div>
</div>



<?php require "elements/footer.php" ?>