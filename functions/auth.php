<?php

function check_auth () : bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function check_connexion() :void
{
    if (!check_auth()) {
        header('location: /login.php');
        exit();
    }
}