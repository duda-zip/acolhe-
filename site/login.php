<?php
session_start();
$message = '';
if (isset($_GET['status']) && $_GET['status'] === 'error') {
    $message = 'CNPJ ou senha inválidos.';
}
?>

<?php if ($message): ?>
    <div class="alert" id="alert-message"><?= htmlspecialchars($message) ?></div>
    <script>
        setTimeout(() => {
            const alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                alertMessage.style.transition = 'opacity 1s ease';
                alertMessage.style.opacity = '0';
                setTimeout(() => alertMessage.remove(), 1000);
            }
        }, 3500);
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Definindo os links de estilização-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <!--Definindo Favicon-->
    <link rel="shortcut icon" href="../img/logoblue.svg" type="image/x-icon">
    <title>Login - Acolhe+</title>
</head>
<body>

    <header>
        <div class="logo"><a href="../site/index.php"><img src="../img/logoblue.svg" alt=""></a></div>
        <div class="menu" id="openMenu">
            <div class="hamburger">&#9776;</div>
        </div>
    </header>

    <div class="side-menu" id="sideMenu">
        <div class="side-menu-header">
            <div class="side-logo"><img src="" alt=""></div>
            <div class="close-btn" id="closeMenu">&times;</div>
        </div>
        <ul class="side-links">
            <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <li class="sub-link"><a href="profile.php">Meu Perfil</a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']): ?>
            <li class="sub-link"><a href="../site/register.php">Registrar</a></li>
            <li class="sub-link"><a href="../site/login.php">Faça seu login</a></li>
            <?php endif; ?>
            <li class="sub-link"><a href="../site/judicial.php">Consultoria Jurídica</a></li>
            <li class="sub-link"><a href="https://www.instagram.com/">Instagram</a></li>
            <li class="sub-link"><a href="https://www.facebook.com/">Facebook</a></li>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <li class="sub-link"><a href="../site/logout.php">Sair</a></li>
            <?php endif; ?>
          </ul>
        <div class="bottom-location">
            <div class="city">São Paulo</div>
        </div>
    </div>
    <hr>
    
    <div class="main">
        <!--Título, parágrafo e imagem no meio da tela-->
        <div class="text">
            <h2>Faça seu login</h2>
            <p>Bem vindo de volta! Faça seu login para realizar um orçamento e manter a acessibilidade de sua empresa em dia.</p>
            <img src="../img/Team spirit-pana.svg" alt="">
        </div>

        <!--Formulário de login-->
        <div class="form_content">
            <img src="../img/logoblue.svg" alt="logo">
            <form action="../php/login.php" method="post">
                <div class="input_content">
                    <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                    <input type="password" name="pass" id="pass" placeholder="Senha" minlength="8" required>
                </div>

                <!--Botão de login-->
                <input class="btn" type="submit" name="Login" value="Login">
            </form>

            <!--Links para registrar e recuperar a senha-->
            <a href="../site/register.php">Não tem uma conta? Registre-se já!</a>
            <a href="#">Esqueceu a senha?</a>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>