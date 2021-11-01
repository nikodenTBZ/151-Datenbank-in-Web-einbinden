<?php
session_start();

include 'databaseController.php';

if (
    isset($_REQUEST['email']) &&
    isset($_REQUEST['password']) &&
    isset($_REQUEST['passwordConfirm'])
) {
    if ($_REQUEST['password'] == $_REQUEST['passwordConfirm']) {
        if (register($_REQUEST['email'], $_REQUEST['password'])) {
            $_SESSION['email'] = $_REQUEST['email'];
            $_SESSION['errorMessage'] = '';
            header('Location: ../login.php');
        } else {
            header('Location: ../login.php');
        }
    } else {
        $_SESSION['errorMessage'] = 'Passwörter stimmen nicht überein';
        header('Location: ../register.php?email=' . $_REQUEST['email']);
    }
} else {
    $_SESSION['errorMessage'] = 'Mehr Parameter benötigt';
    header('Location: ../register.php?email=' . $_REQUEST['email']);
}
