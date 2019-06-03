<?php
    $echec = null;
    $success = null;
    $valeur = null;
    $aDeviner = 150;

    if (isset($_POST['chiffre'])) {
        $valeur = (int) $_POST['chiffre'];
        if ($valeur > $aDeviner) {
            $echec = '<div class="alert alert-danger">Votre chiffre est trop grand</div>';
        } elseif ($valeur < $aDeviner) {
            $echec = '<div class="alert alert-danger">Votre chiffre est trop petit</div>';
        } else {
            $success = '<div class="alert alert-success">Bravo vous avec deviner le nombre : '.$aDeviner.'</div>';
        }
    }
    require "elements/header.php";?>

    <?php 
        if ($echec) {
            echo $echec;
        } elseif ($success) {
            echo $success;
        }
    ?>
    


<form action="/jeu.php" method="POST">
<div class="form-group ">
   
    <input type="number" class="form-control" name="chiffre" placeholder=" entre 0 et 1000" value ="<?= $valeur ?>">
</div>
    <button type="submit" class="btn btn-primary">Deviner</button>
</form>


<?php require "elements/footer.php"; ?>