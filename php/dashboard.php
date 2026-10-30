<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['cnpj'])) {
    header("location: login.php");
    exit();
}

$cnpj = $_SESSION['cnpj'];

$stmt = $conn->prepare("SELECT * FROM accounts WHERE cnpj = ?");
$stmt->execute([$cnpj]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Bem-vindo</h1>
<p>Empresa: <?php echo htmlspecialchars($user['company']); ?></p>
<p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
