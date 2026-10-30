<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Acolhe+</title>
  <link rel="stylesheet" href="../css/us.css">
  <link rel="shortcut icon" href="../img/logoblue.svg" type="image/x-icon">
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

  <div class="video-container">
    <video autoplay muted loop playsinline id="bg-video">
      <source src="../img/video da pagina sobre nós.mp4" type="video/mp4" />
    </video>
    <div class="overlay"></div>
  </div>

  <section class="sobre-acolhe">
    <h1>Sobre a Acolhe+</h1>
    <div class="cards">
      <div class="card1">
        <p>
          Evidenciando a significativa lacuna existente no mercado em relação à oferta de serviços adequados e acessíveis às pessoas com deficiência, o Acolhe+ surge como uma iniciativa inovadora voltada a apoiar empresas na implementação de práticas de acessibilidade de forma eficiente, descomplicada e eficaz.
        </p>
      </div>
      <div class="card2">
        <p>
          Nosso propósito transcende o mero cumprimento das exigências legais: buscamos contribuir para a consolidação de um compromisso ético por parte das organizações, promovendo a equidade de oportunidades e o respeito à diversidade em todas as suas dimensões.
        </p>
      </div>
      <div class="card3">
        <p>
          Dessa maneira, almejamos colaborar para a construção de ambientes mais inclusivos, acolhedores e justos — tanto no contexto corporativo quanto nas relações de consumo —, assegurando que todos os indivíduos, independentemente de suas condições, possam exercer plenamente seus direitos e potencialidades.
        </p>
      </div>
    </div>
  </section>

  <script src="../js/script.js"></script>
</body>

</html>