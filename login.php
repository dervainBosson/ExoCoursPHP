<?php
$password = '$2y$12$XKM4Aas7IR.f7A/qjO/OLu1Kp/salUdYMOcZXHQN6tzCGyhj6c5.a';
$error = null;

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    if ($_POST['username'] === 'Jhon' && password_verify('Doe', $password)) {

        session_start();
        $_SESSION['connecte'] = 1;
        header('location: /dashboard.php');
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}

require 'functions/auth.php';
if (check_auth()) {
    header('location: /dashboard.php');
    exit();
}

require 'elements/header.php'; ?>




<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-10">
        <form method="post" action="">
            <div class="form-group">
                <label for="formGroupExampleInput">USERNAME</label>
                <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="put your username">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">PASSWORD</label>
                <input type="password" class="form-control" name="password" id="formGroupExampleInput2">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>


<?php require 'elements/footer.php'; ?>