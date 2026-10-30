<?php

class clscliente{
    private $name;
    private $company;
    private $cnpj;
    private $address;
    private $email;
    private $pass;
    private $telephone;

    public function getname()
{
    return $this-> name;
}
public function setname($na)
{
    $this->name = $na;
}
//-------------

public function getcompany()
{
    return $this-> company;
}
public function setcompany($co)
{
    $this->company = $co;
}
//-------------

    public function getcnpj()
{
    return $this-> cnpj;
}
public function setcnpj($cn)
{
    $this->cnpj = $cn;
}
//-------------

public function getaddress()
{
    return $this-> address;
}
public function setaddress($ad)
{
    $this->address = $ad;
}
//-------------

public function getemail()
{
    return $this-> email;
}
public function setemail($em)
{
    $this->email = $em;
}
//-------------

public function getpass()
{
    return $this-> pass;
}
public function setpass($pa)
{
    $this->pass = $pa;
}
//-------------

public function gettelephone()
{
    return $this-> telephone;
}
public function settelephone($tl)
{
    $this->telephone = $tl;
}
//-------------


public function ConsultaClientePorCNPJ($cnpj) {
    include_once "connection.php";
    try {
        $Comando = $conn->prepare("SELECT * FROM accounts WHERE cnpj = ?");
        $Comando->bindParam(1, $cnpj);
        $Comando->execute();
        $resultado = $Comando->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado;  // Retorna os dados do cliente como um array associativo
        } else {
            return ["erro" => "Cliente não encontrado."];
        }
    } catch (PDOException $Erro) {
        return ["erro" => "Erro na consulta: " . $Erro->getMessage()];
    }
}

public function Alterar() {
    include_once "connection.php";

    try {
        $stmt = $conn->prepare(
            "UPDATE accounts SET name = ?, company = ?, address = ?, email = ?, pass = ?, telephone = ?  WHERE cnpj = ?");

        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->company);
        $stmt->bindParam(3, $this->address);
        $stmt->bindParam(4, $this->email);
        $stmt->bindParam(5, $this->pass);
        $stmt->bindParam(6, $this->telephone);
        $stmt->bindParam(7, $this->cnpj);

        if ($stmt->execute()) {
            return "Cliente alterado com sucesso!";
        } else {
            return "Erro ao tentar alterar o cliente.";
        }
    } catch (PDOException $Erro) {
        return "Erro: " . $Erro->getMessage();
    }
}


public function Deletar()
{
    include_once "connection.php";

    try {
        $Comando = $conn->prepare("DELETE FROM accounts WHERE cnpj = ?");
        $Comando->bindParam(1, $this->cnpj, PDO::PARAM_STR);

        if ($Comando->execute()) {
            return "Cliente removido com sucesso!";
        } else {
            return "Erro ao tentar remover o cliente.";
        }
    } catch (PDOException $Erro) {
        return "Erro: " . $Erro->getMessage();
    }
}

    public function ConsultaCliente() {
        include_once "connection.php";
        try {
            $Comando = $conn->prepare("select accounts.name,
        accounts.company,
        accounts.cnpj,
        accounts.address,
        accounts.email,
        accounts.pass,
        accounts.telephone
        from accounts");
            $Comando->execute();
            $resultados = $Comando->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $Erro) {
            return json_encode(["erro" => "Erro ao consultar clientes: " . $Erro->getMessage()]);
        }
    }
}