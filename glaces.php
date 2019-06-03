<?php
require_once 'functions.php';
//Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
//Radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
//Checkbox
$supplements = [
    'Pépites de cocolat' => 1,
    'Chantilly' => 0.5
];

$ingredients = [];
$total = 0;
if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) 
    {
        if (isset($parfums[$parfum]))
        {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
        dump($parfum);
    }
    dump($ingredients);
    dump($total);
    
}
if (isset($_GET['supplement'])) {
    foreach ($_GET['supplement'] as $supplement) 
    {
        if (isset($supplements[$supplement]))
        {
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
        
    }
}
if (isset($_GET['cornet'])) { 
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet]))
    {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
        
}
require 'elements/header.php';?>


<div class="row">
    <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>Votre glace</strong></h5>
            <p class="card-text">
                <ul>
                    <?php foreach($ingredients as $ingredient) :?>
                    <li> <?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>
                <strong>Prix :</strong> <?= $total ?> €
            </p>
        </div>
    </div>
    </div>
    <div class="col-md-8">
        <h1>Composer votre glace</h1>
        <form method="GET" action="/glaces.php">
            <h2>Parfums</h2>
            <div class="form-group">
                <?php foreach ($parfums as $parfum => $prix): ?>
                    <div class="checkbox">
                        <label >
                            <?= generateInputCheckbox('parfum', $parfum, $_GET) ?>
                            <?= $parfum ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <h2>Cornet</h2>
            <div class="form-group">
                <?php foreach ($cornets as $key => $value): ?>
                    <div class="checkbox">
                    <label >
                        <?= generateInputRadiobox('cornet', $key, $_GET) ?>
                        <?= $key ?> - <?= $value ?> €
                    </label>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="form-group">
            <h2>Suppléments</h2>
                <?php foreach($supplements as $supplement => $prix) : ?>
                    <div class="checkbox">
                        <label>
                            <?= generateInputCheckbox('supplement', $supplement, $_GET) ?>
                            <?= $supplement ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <button class="btn btn-primary" type="submit">Calculer</button>
        </form>
    </div>
</div>
<h2>$_GET</h2>
<pre>
    <?php var_dump($_GET); ?>
</pre>
<?php require 'elements/footer.php'; ?>