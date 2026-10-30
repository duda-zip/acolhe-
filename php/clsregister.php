<?php

class clsregister{
    private $company;
    private $cnpj;
    private $address;
    private $email;
    private $pass;
    private $telephone;

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

public function Register()
{
    include_once "connection.php";

    try {
        $stmt = $conn->prepare("INSERT INTO accounts(company, cnpj, address, email, pass, telephone) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $this->company);
        $stmt->bindParam(2, $this->cnpj);
        $stmt->bindParam(3, $this->address);
        $stmt->bindParam(4, $this->email);
        $stmt->bindParam(5, $this->pass);
        $stmt->bindParam(6, $this->telephone);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $Erro) {
        throw new Exception("Erro no banco de dados: " . $Erro->getMessage());
    }
}
}