<?php
session_start();

include 'connection.php';
include_once "clsprofile.php";

$clsp = new clsprofile();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = isset($_POST['name']) ? trim($_POST['name']) : '';
    $company    = isset($_POST['company']) ? trim($_POST['company']) : '';
    $cnpj       = isset($_POST['cnpj']) ? trim($_POST['cnpj']) : '';
    $address    = isset($_POST['address']) ? trim($_POST['address']) : '';
    $email      = isset($_POST['email']) ? trim($_POST['email']) : '';
    $telephone  = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
    $pass       = isset($_POST['pass']) ? trim($_POST['pass']) : '';
    $acao       = isset($_POST['acao']) ? trim($_POST['acao']) : '';

    if ($acao === 'Alterar') {
        if ($pass === $_SESSION['user']['pass']) {
            if ($clsp->updateProfile($name, $company, $cnpj, $address, $email, $telephone)) {
                $_SESSION['nome'] = $name;
                $_SESSION['empresa'] = $company;
                $_SESSION['endereço'] = $address;
                $_SESSION['email'] = $email;
                $_SESSION['telefone'] = $telephone;
    
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Informações atualizadas com sucesso.'
                ];
                header("Location: ../site/profile.php");
                exit;
            } else {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'Erro ao atualizar as informações.'
                ];
                header("Location: ../site/profile.php");
                exit;
            }
        } else {
            $_SESSION['message'] = [
                'type' => 'error',
                'text' => 'Senha atual incorreta.'
            ];
            header("Location: ../site/profile.php");
            exit;
        }
    } elseif ($acao === 'Excluir') {
        if ($clsp->deleteProfile($cnpj)) {
            session_destroy();
            $_SESSION['message'] = [
                'type' => 'success',
                'text' => 'Conta excluída com sucesso.'
            ];
            header("Location: ../site/index.php");
            exit;
        } else {
            $_SESSION['message'] = [
                'type' => 'error',
                'text' => 'Erro ao tentar excluir a conta.'
            ];
            header("Location: ../site/profile.php");
            exit;
        }
    } else {
        $_SESSION['message'] = [
            'type' => 'error',
            'text' => 'Ação inválida.'
        ];
        header("Location: ../site/profile.php");
        exit;
    }    
}