<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Acolhe+</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link rel="shortcut icon" href="../img/logoblue.svg" type="image/x-icon">
</head>

<body>
  <div class="video-container">
    <video autoplay muted loop playsinline id="bg-video">
      <source src="../img/video-placeholder.mp4" type="video/mp4" />
    </video>
    <div class="overlay"></div>
  </div>

  <header>
    <div class="logo"><a href="../site/index.php"><img src="../img/logoblue.svg" alt=""></a></div>
    <div class="menu" id="openMenu">
      <div class="hamburger">&#9776;</div>
    </div>
  </header>

  <main class="hero">
    <div class="hero-content">
      <p>Simplificando a acessibilidade.<br> Promovendo a inclusão.<br> Criando um futuro mais igualitário para todos!</p>
      <a href="../site/services.php"><button class="hero-button">Conheça nossos serviços</button></a>
    </div>
    <div class="scroll-indicator">⬤</div>
  </main>

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
        <li class="sub-link"><a href="register.php">Registrar</a></li>
        <li class="sub-link"><a href="login.php">Faça seu login</a></li>
      <?php endif; ?>
      <li class="sub-link"><a href="judicial.php">Política e Privacidade</a></li>
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

  <section class="sobre-nos">
    <div class="sobre-texto">
      <h2>Somos uma agência de<br>contratação de serviços<br>para acessibilidade.</h2>
      <p>Apoiamos as empresas na implementação de práticas de acessibilidade de maneira simples, prática e eficaz.</p>
      <a href="../site/us.php"><button class="hero-button">Saiba mais sobre nós</button></a>
    </div>
    <div class="sobre-logo">
      <p></p>
    </div>
  </section>

  <section class="chat-section">
    <div class="chat-text">
      <h2>Precisa de algum serviço<br>para sua empresa?</h2>
      <p>
        A nossa empresa conta com um sistema de chat online, possibilitando a comunicação entre o cliente e nós.
      </p>
      <a href="../site/chat.php"><button class="chat-button">Chat online</button></a>
    </div>
    <div class="chat-image"></div>
  </section>

  <section class="gallery">
    <div class="gallery-container">
      <img src="../img/img3.svg" alt="Imagem 1">
      <img src="../img/img4.svg" alt="Imagem 2">
      <img src="../img/img5.svg" alt="Imagem 3">
      <img src="../img/img6.svg" alt="Imagem 4">
      <img src="../img/img7.svg" alt="Imagem 5">
      <img src="../img/img8.svg" alt="Imagem 6">
      <img src="../img/img9.svg" alt="Imagem 7">
      <img src="../img/img10.svg" alt="Imagem 8">
    </div>
  </section>

  <section class="contato-container">
    <div class="formulario">
      <h1>Fale<br>Conosco</h1>
      <form>
        <div class="campo-duplo">
          <div class="campo">
            <label for="nome">Nome</label>
            <input type="text" id="nome" placeholder="Seu nome">
          </div>
          <div class="campo">
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" placeholder="Deixe sua mensagem"></textarea>
          </div>
        </div>

        <div class="campo">
          <label for="telefone">Telefone</label>
          <input type="text" id="telefone" placeholder="Seu telefone">
        </div>

        <div class="campo">
          <label for="empresa">Empresa</label>
          <input type="text" id="empresa" placeholder="Sua empresa">
        </div>

        <div class="campo">
          <label for="email">E-mail</label>
          <input type="email" id="email" placeholder="Seu e-mail">
        </div>

        <button type="submit">Enviar</button>
      </form>
    </div>

    <aside class="info-contato">
      <div class="local">
        <h3>São Paulo</h3>
        <p>Obter direções &nbsp; | &nbsp; +55 40028922</p>
      </div>

      <div class="pessoas">
        <div class="pessoa">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
          <div>
            <strong>Lucas Stratos</strong>
            <p>CEO</p>
          </div>
        </div>
        <div class="pessoa">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
          <div>
            <strong>Guilherme Soto</strong>
            <p>Presidente e Fundador</p>
          </div>
        </div>
        <div class="pessoa">
          <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
          <div>
            <strong>Beatriz Novaes</strong>
            <p>Diretor Executivo</p>
          </div>
        </div>
      </div>
      <a href="cronograma.html">Cronograma</a>
    </aside>
  </section>


  <script src="../js/script.js"></script>


</body>

</html>