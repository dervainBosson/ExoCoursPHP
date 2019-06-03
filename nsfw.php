<?php
require_once "functions.php";
$errors = null;
$age = null;

if (!empty($_COOKIE['birthYear'])) {
    $age = (int)$_COOKIE['birthYear'];
}
if (isset($_POST['birthYear'])) {
    if ($_POST['birthYear'] === 'Choissez vôtre année de naissance') {
        $errors = 'Veillez choissir votre année de naissance svp !';
    } else {
        $age = date('Y') - (int)$_POST['birthYear'];
        setcookie('birthYear', $age);
    }
}
dump($age);
require 'elements/header.php'; ?>


<div class="row">
    <div class="col-md-12">
        <?php if ($errors) : ?>
            <div class="alert alert-danger">
                <?= $errors ?>
            </div>
        <?php endif; ?>
        <form method="post" action="" class="form-inline">
            <select name="birthYear" class="custom-select mr-md-2">
                <option selected>Choissez vôtre année de naissance</option>
                <?php for ($i = 2010; $i > 1919; $i--) : ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
    <?php if ($age) : ?>
    <?php if ($age > 18) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1>Bienvenue</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis tenetur nam, fugiat maiores laudantium fugit odit, libero magni aperiam ex hic nihil veniam similique totam ipsa asperiores ad officiis non?</p>
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger">
                        Désolé vous n'avez pas acces à cette partie du site.
                    </div>
                </div>
            </div>
                <?php endif; ?>
            <?php endif; ?>
</div>
<?php require 'elements/footer.php'; ?>