<?php
$message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $message = 'Registro realizado com sucesso.';
    } elseif ($_GET['status'] === 'error') {
        $message = 'Erro ao tentar registrar. Tente novamente.';
    }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">
    <!--Definindo Favicon-->
    <link rel="shortcut icon" href="../img/logoblue.svg" type="image/x-icon">
    <title>Registro - Acolhe+ </title>
</head>

<body>

    <!--Definindo o cabeçalho da página de registro-->
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
            <h2>Faça seu registro</h2>
            <p>Simplificando a acessibilidade, promovendo a inclusão e criando um futuro mais igualitário para todos!
                Venha fazer parte do time Acolhe+.</p>
            <img src="../img/Team spirit-pana.svg" alt="">
        </div>

        <!--Formulário de registro-->
        <div class="form_content">
            <img src="../img/logoblue.svg" alt="logo">
            <form action="../php/contrregister.php" method="post">
                <div class="input_content">
                    <input type="number" name="telephone" id="telephone" placeholder="Telefone" required>
                    <input type="text" name="company" id="company" placeholder="Empresa" required>
                    <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ" required>
                    <input type="text" name="address" id="address" placeholder="Endereço" required>
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                    <input type="password" name="pass" id="pass" placeholder="Senha" minlength="8" required>
                </div>

                <!--Botão de registrar-->
                <input class="btn" type="submit" value="Registrar">
            </form>
            <!--Links para logar caso já tenha uma conta-->
            <a href="../site/login.php">Já tem uma conta? Entre agora</a>
        </div>

    </div>

    <script src="../js/script.js"></script>

</body>

</html>