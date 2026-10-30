<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="shortcut icon" href="../img/logoblue.svg" type="image/x-icon">
    <title>Chat Online - Acolhe+</title>
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
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
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

    <div class="chat-container">
        <div class="chat-messages" id="chat-messages">
            <!--  <div class="message bot">Olá! Como posso te ajudar hoje?</div>!-->
        </div>
        <div class="document-input">
            <div class="input-document">
                <button onclick="Options()" id="optionsButton">+</button>

                <div id="optionsMenu">
                    <ul>
                        <li>
                            <input type="file" accept="image/*,video/*" id="fileInput" style="display: none;" onchange="handleFile(this)">
                            <button onclick="document.getElementById('fileInput').click()">📎 Adicionar Anexo</button>
                        </li>
                    </ul>
                </div>


            </div>
            <div class="chat-input">
                <div class="input-wrapper">
                    <input type="text" id="chat-input" placeholder="Digite sua mensagem..." />
                    <button onclick="sendMessage()">➤</button>
                </div>
            </div>
        </div>
    </div>

    <!--<script>
        function sendMessage() {
            const input = document.getElementById('chat-input');
            const messagesContainer = document.getElementById('chat-messages');
            const text = input.value.trim();

            if (text === '') return;

            // Cria a mensagem do usuário
            const userMsg = document.createElement('div');
            userMsg.className = 'message user';
            userMsg.textContent = text;
            messagesContainer.appendChild(userMsg);

            input.value = '';
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Simula uma resposta do bot
            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.className = 'message bot';
                botMsg.textContent = gerarRespostaBot(text);
                messagesContainer.appendChild(botMsg);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }, 500);
        }

        function gerarRespostaBot(pergunta) {
            // Aqui você pode usar lógica simples ou IA mais tarde
            if (pergunta.toLowerCase().includes('chat')) {
                return 'Você está no lugar certo! Posso te ajudar a criar um.';
            } else if (pergunta.toLowerCase().includes('oi') || pergunta.toLowerCase().includes('olá')) {
                return 'Oi! Tudo bem com você?';
            } else {
                return 'Entendi! Quer me contar mais sobre isso?';
            }
        }

        // Permitir enviar com Enter
        document.getElementById('chat-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script> !-->


    <script src="../js/script.js"></script>
    <script src="../js/chat.js"></script>
</body>

</html>