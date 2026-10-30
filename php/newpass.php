<?php
session_start();
include 'connection.php';
include_once "clsprofile.php";

$clsp = new clsprofile();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: ../site/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atualpass      = trim($_POST['atualpass'] ?? '');
    $newpass        = trim($_POST['newpass'] ?? '');
    $confirmpass    = trim($_POST['confirmpass'] ?? '');

    if ($atualpass !== trim($_SESSION['user']['pass'])) {
        $_SESSION['error'] = "A senha atual está incorreta.";
        header("Location: ../site/profile.php");
        exit;
    }

    if ($newpass !== $confirmpass) {
        $_SESSION['error'] = "As novas senhas não coincidem.";
        header("Location: ../site/profile.php");
        exit;
    }

    if ($clsp->updatePassword($_SESSION['user']['cnpj'], $newpass)) {
        $_SESSION['user']['pass'] = $newpass;
        $_SESSION['success'] = "Senha alterada com sucesso.";
        header("Location: ../site/profile.php");
        exit;
    } else {
        $_SESSION['error'] = "Erro ao alterar a senha.";
        header("Location: ../site/profile.php");
        exit;
    }
}
