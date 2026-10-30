<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnpj = preg_replace('/\D/', '', $_POST['cnpj']);
    $pass = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM accounts WHERE cnpj = ? AND pass = ?");
    $stmt->execute([$cnpj, $pass]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user'] = [
            'profile_image' => $user['profile_image'],
            'cnpj' => $user['cnpj'],
            'pass' => $user['pass'],
            'name' => $user['name'] ?? '',
            'email' => $user['email'] ?? '',
            'company' => $user['company'] ?? '',
            'address' => $user['address'] ?? '',
            'telephone' => $user['telephone'] ?? '',
        ];

        $_SESSION['cnpj'] = $user['cnpj'];
        $_SESSION['logged_in'] = true;

        header('location: ../site/index.php');
        exit;
    } else {
        header('Location: ../site/login.php?status=error');
        exit;
    }
}
