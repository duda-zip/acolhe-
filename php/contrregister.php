<?php

include_once "clsregister.php";
$clsr = new clsregister();

$telephone  = isset($_POST["telephone"]) ? trim($_POST["telephone"]) : null;
$company    = isset($_POST["company"]) ? trim($_POST["company"]) : null;
$cnpj       = isset($_POST["cnpj"]) ? trim($_POST["cnpj"]) : null;
$address    = isset($_POST["address"]) ? trim($_POST["address"]) : null;
$email      = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$pass       = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;

//remove as pontuações, deixando apenas os numeros
$cnpj = preg_replace('/\D/', '', $cnpj);

//verifica se o cnpj possui 14 caracteres
if (strlen($cnpj) != 14) {
    return false;
}

// Elimina CNPJs com números repetidos (ex: 00000000000000)
if (preg_match('/(\d)\1{13}/', $cnpj)) {
    return false;
}

$clsr->settelephone($telephone);
$clsr->setcompany($company);
$clsr->setcnpj($cnpj);
$clsr->setaddress($address);
$clsr->setemail($email);
$clsr->setpass($pass);

try {
    $result = $clsr->Register();
    if ($result) {
        header('Location: ../site/login.php');
        exit;
    } else {
        header('Location: ../site/register.php?status=error');
        exit;
    }
}catch (Exception $e) {
    error_log('Erro no registro: ' . $e->getMessage());
    header('Location: ../site/register.php?status=error');
    exit;
}