<?php
require_once 'functions.php';
$title = "Notre menu";
$lignes = file(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'menu.tsv');
foreach ($lignes as $key => $ligne) {
    $lignes[$key] = explode("\t", trim($ligne));
}
require "elements/header.php" ?>


<h1>MENU</h1>
<?php foreach($lignes as $ligne) :?>
    <?php if(count($ligne) === 1) : ?>
        <h2><?= $ligne[0] ;?></h2> <hr/>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-8">
                <p>
                    <strong><?= $ligne[0];?></strong><br>
                    <em><?= $ligne[1];?></em>
                </p>
            </div>
            <div class="col-sm-4">
                <br><b><?= number_format($ligne[2], 2, ',', ' ') ;?> €</b> 
            </div>
        </div>
    <?php endif;?>
<?php endforeach ;?>

<?php require "elements/footer.php" ?>