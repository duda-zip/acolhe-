<?php

class clsprofile {
    private $name;
    private $company;
    private $cnpj;
    private $address;
    private $email;
    private $pass;
    private $telephone;
    private $newpass;

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

public function getnewpass()
{
    return $this-> newpass;
}
public function setnewpass($np)
{
    $this->newpass = $np;
}
//-------------



public function updateProfile($name, $company, $cnpj, $address, $email, $telephone) {
    include_once "connection.php";
    global $conn;

    try {
        $this->name = $name;
        $this->company = $company;
        $this->cnpj = $cnpj;
        $this->address = $address;
        $this->email = $email;
        $this->telephone = $telephone;

        $stmt = $conn->prepare(
            "UPDATE accounts SET name = ?, company = ?, address = ?, email = ?, telephone = ? WHERE cnpj = ?"
        );

        $stmt->bindParam(1, $this->name);
        $stmt->bindParam(2, $this->company);
        $stmt->bindParam(3, $this->address);
        $stmt->bindParam(4, $this->email);
        $stmt->bindParam(5, $this->telephone);
        $stmt->bindParam(6, $this->cnpj);

        if ($stmt->execute()) {
            $stmt = $conn->prepare("SELECT * FROM accounts WHERE cnpj = ?");
            $stmt->execute([$this->cnpj]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($userData) {
                $_SESSION['user'] = [
                    'name' => $userData['name'],
                    'telephone' => $userData['telephone'],
                    'company' => $userData['company'],
                    'cnpj' => $userData['cnpj'],
                    'address' => $userData['address'],
                    'email' => $userData['email'],
                    'pass' => $userData['pass'],
                    'profile_image' => $userData['profile_image'],
                ];
            }
            return true;
        }
        return false;
    } catch (Exception $e) {
        return false;
    }
}


public function deleteProfile($cnpj) {
    include_once 'connection.php';
    global $conn;
    try {
        $Comando = $conn->prepare("DELETE FROM accounts WHERE cnpj = ?");
        $Comando->execute([$cnpj]);

        session_unset();
        session_destroy();

        return true;
    } catch (Exception $e) {
        return false;
    }
}

public function getUserInfo() {
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return null;
}

public function updatePassword($cnpj, $newpass) {
    include_once 'connection.php';
    global $conn;

    try {
        $this->cnpj = $cnpj;
        $this->newpass = $newpass;

        $stmt = $conn->prepare(
            "UPDATE accounts SET pass = ? WHERE cnpj = ?"
        );

        $stmt->bindParam(1, $this->newpass);
        $stmt->bindParam(2, $this->cnpj);

        if ($stmt->execute()) {
            $_SESSION['user']['pass'] = $this->newpass;
            return true;
        }

        return false;
    } catch (Exception $e) {
        return false;
    }
}
}