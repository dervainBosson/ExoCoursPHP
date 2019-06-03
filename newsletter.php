<?php
$error = null;
$success = null;
$email = null;
if (!empty($_POST['email'])) {

    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email.PHP_EOL, FILE_APPEND);
        $success ="Vôtre email a bien été enregistré";
    } else {
        $error = "Email invalide";
    }
}

require "elements/header.php"; ?>


<div class="row">
    <div class="col-md-12">
        <h1>S'inscrire à la newsletter</h1>
        <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident minima at dicta beatae ad odit esse quam velit architecto placeat voluptas suscipit accusantium officiis iste facere eligendi, quidem optio autem!</p>

        <?php if ($error) : ?>
            <div class="alert alert-danger">
                <?= $error; ?>
            </div>
        <?php endif; ?>
        <?php if ($success) : ?>
            <div class="alert alert-success">
                <?= $success; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/newsletter.php" class="form-inline">
            <input name="email" class="form-control mr-sm-2" type="email" value="<?= htmlentities($email); ?>" required>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</div>



<?php require "elements/footer.php"; ?>