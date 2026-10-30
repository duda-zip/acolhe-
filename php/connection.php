<?php 

$Bco = 'acolhemaisdb';
$Usuario = 'root';
$Senha = '';

try{
    $conn = new PDO("mysql:host=localhost; dbname=$Bco", "$Usuario", "$Senha");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
}
catch (PDOException $erro)
{
    echo "Erro na conexão:" . $erro->getMessage();
}