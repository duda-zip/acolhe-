<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message']['text'];
    echo "<div class='message-container'>
            <div class='alert' id='alert-message'>{$message}</div>
          </div>";
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/profile.css">
    <title>Meu perfil - Acolhe+</title>
</head>
<body onload="clienteinfo()">
    
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
      <li class="sub-link"><a href="register.php">Registrar</a></li>
      <li class="sub-link"><a href="login.php">Faça seu login</a></li>
      <?php endif; ?>
      <li class="sub-link"><a href="judicial.php">Consultoria Jurídica</a></li>
      <li class="sub-link"><a href="https://www.instagram.com/">Instagram</a></li>
      <li class="sub-link"><a href="https://www.facebook.com/">Facebook</a></li>
      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
      <li class="sub-link"><a href="logout.php">Sair</a></li>
      <?php endif; ?>
    </ul>
    <div class="bottom-location">
      <div class="city">São Paulo</div>
    </div>
  </div>
    <hr>

    <form id="imageform" method="POST" action="../php/upload.php" enctype="multipart/form-data">
    <div class="image-info">
    <img id="profileImage" src="<?php echo '../' . ($_SESSION['user']['profile_image'] ?? 'img/default-profile.jpg'); ?>"
     alt="Imagem do perfil"
     style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">


        <input type="file" id="imageInput" name="profile_image" accept="image/*" style="display: none;">
        <button type="button" id="changeImageButton">Alterar e Salvar Imagem</button>
    </div>
</form>

    <div class="account-info">
        <form action="../php/contrprofile.php" method="post">
            <div class="input-content">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name">

                <label for="telephone">Telefone</label>
                <input type="text" name="telephone" id="telephone">

                <label for="company">Empresa</label>
                <input type="text" name="company" id="company">

                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" readonly>

                <label for="address">Endereço</label>
                <input type="text" name="address" id="address">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

                <label for="pass">Confirme sua senha</label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <input type="hidden" name="acao" id="acao" value="">

    <input type="submit" name="Alterar" id="Alterar" value="Alterar informações">
    <button type="button" id="btnAbrirModal">Alterar Senha</button>
    <input type="submit" name="Excluir" id="Excluir" value="Excluir conta">
        </form>
    </div>


    <div id="modalSenha" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Alterar Senha</h2> <br>
        <form action="../php/newpass.php" method="post">

        <label for="atualpass">Senha atual</label>
        <input type="password" name="atualpass" id="atualpass" minlength="8" required> <br>

        <label for="newpass">Nova Senha</label>
        <input type="password" name="newpass" id="newpass" minlength="8" required> <br>

        <label for="confirmpass">Confirmar Nova Senha</label>
        <input type="password" name="confirmpass" id="confirmpass" minlength="8" required> <br><br>

            <input type="submit" value="Salvar Nova Senha">
        </form>
    </div>
</div>

    <script>
    document.getElementById('Alterar').addEventListener('click', function() {
        document.getElementById('acao').value = 'Alterar';
    });

    document.getElementById('Excluir').addEventListener('click', function() {
        document.getElementById('acao').value = 'Excluir';
    });

    const modal = document.getElementById("modalSenha");
    const btnAbrir = document.getElementById("btnAbrirModal");
    const spanFechar = document.querySelector(".modal .close");

    btnAbrir.onclick = function () {
        modal.style.display = "block";
    }

    spanFechar.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    const imageInput = document.getElementById('imageInput');
    const profileImage = document.getElementById('profileImage');
    const changeImageButton = document.getElementById('changeImageButton');
    const imageForm = document.getElementById('imageform');

    changeImageButton.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', (event) => {
    const file = event.target.files[0];

    if (file) {
        const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!validImageTypes.includes(file.type)) {
            alert('Por favor, selecione uma imagem válida (JPG, PNG, GIF, WEBP).');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);

        imageForm.submit();
    }
});

</script>

<script>
    function clienteinfo() {
        const userData = <?php echo json_encode($_SESSION['user'] ?? null); ?>;

        if (userData) {
            document.getElementById('name').value = userData.name || '';
            document.getElementById('telephone').value = userData.telephone || '';
            document.getElementById('company').value = userData.company || '';
            document.getElementById('cnpj').value = userData.cnpj || '';
            document.getElementById('address').value = userData.address || '';
            document.getElementById('email').value = userData.email || '';
        } else {
            console.warn('Nenhum dado de usuário foi encontrado na sessão.');
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        clienteinfo();
    });
</script>

<script>
    setTimeout(() => {
        const alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.classList.add('fade-out');
            setTimeout(() => alertMessage.remove(), 1000);
        }
    }, 3000);
</script>

<script src="../js/script.js"></script>
</body>
</html>