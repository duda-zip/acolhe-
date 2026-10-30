<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../site/login.php");
    exit;
}

$message = $_SESSION['message'] ?? null;
unset($_SESSION['message']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/profile.css">
    <title>Detalhes do Perfil</title>
</head>
<body>


    <div class="message-container">
        <?php if ($message): ?>
            <div class="alert <?php echo $message['type']; ?>" id="alert-message">
                <?php echo $message['text']; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="profile-details">
        <h2>Informações do Perfil</h2>
        
        <div class="profile-info">
            <p><strong>Nome:</strong> <?php echo $_SESSION['user']['name']; ?></p>
            <p><strong>Telefone:</strong> <?php echo $_SESSION['user']['telephone']; ?></p>
            <p><strong>Empresa:</strong> <?php echo $_SESSION['user']['company']; ?></p>
            <p><strong>CNPJ:</strong> <?php echo $_SESSION['user']['cnpj']; ?></p>
            <p><strong>Endereço:</strong> <?php echo $_SESSION['user']['address']; ?></p>
            <p><strong>E-mail:</strong> <?php echo $_SESSION['user']['email']; ?></p>
            <p><strong>Senha:</strong> <?php echo $_SESSION['user']['pass']; ?></p>
        </div>

        <a href="profile.php" class="btn">Voltar ao perfil</a>
    </div>
    
    <script>
        setTimeout(() => {
            const alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.classList.add('fade-out');
                setTimeout(() => alertMessage.remove(), 1000);
            }
        }, 3000);
    </script>
</body>
</html>
