<?php
session_start();

header('Content-Type: application/json');

include_once "clscliente.php";
$clsc = new clscliente();

$name       = isset($_POST["name"]) ? trim($_POST["name"]) : null;
$cnpj       = isset($_POST["cnpj"]) ? trim($_POST["cnpj"]) : null;
$company    = isset($_POST["company"]) ? trim($_POST["company"]) : null;
$address    = isset($_POST["address"]) ? trim($_POST["address"]) : null;
$email      = isset($_POST["email"]) ? trim($_POST["email"]) : null;
$pass       = isset($_POST["pass"]) ? trim($_POST["pass"]) : null;
$telephone  = isset($_POST["telephone"]) ? trim($_POST["telephone"]) : null;


$clsc->setname($name);
$clsc->setcompany($company);
$clsc->setcnpj($cnpj);
$clsc->setaddress($address);
$clsc->setemail($email);
$clsc->setpass($pass);
$clsc->settelephone($telephone);


if (isset($_POST["acao"]) && $_POST["acao"] == "alterar") {
    if ($clsc->Alterar()) {
        echo json_encode(["sucesso" =>"Cliente alterado com sucesso!"]);
    } else {
        echo json_encode(["erro" =>"Erro ao tentar alterar o cliente."]);
    }
} else if (isset($_POST["acao"]) && $_POST["acao"] == "deletar") {
    if ($clsc->Deletar()) {
        echo json_encode(["sucesso" =>"Cliente removido com sucesso!"]);
    } else {
        echo json_encode(["erro" =>"Erro ao tentar remover o cliente."]);
    }

}else if(isset($_GET["ListaCliente"])) {
    $resultados = $clsc->ConsultaCliente();
    if (is_array($resultados) && !empty($resultados)) {
        echo json_encode($resultados);
    } else {
        echo json_encode(["erro" => "Nenhum cliente encontrado."]);
    }

} else if (isset($_GET["ConsultaClienteCNPJ"])) {
    $cnpj = $_GET["ConsultaClienteCNPJ"];
    $resultados = $clsc->ConsultaClientePorCNPJ($cnpj);
if ($resultados && !isset($resultados['erro'])) {
    echo json_encode($resultados);
} else {
    echo json_encode(["erro" => "Cliente não encontrado."]);
}
}