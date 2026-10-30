<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nossos Serviços</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
  <link rel="stylesheet" href="../css/services.css">

</head>

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
      <li class="sub-link"><a href="profile.">Meu Perfil</a></li>
    <?php endif; ?>
    <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']): ?>
      <li class="sub-link"><a href="../site/register.php">Registrar</a></li>
      <li class="sub-link"><a href="../site/login.php">Faça seu login</a></li>
    <?php endif; ?>
    <li class="sub-link"><a href="../site/judicial.">Consultoria Jurídica</a></li>
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

<body>
  <h1>Nossos Serviços</h1>
  <p class="intro">
    Oferecemos serviços especializados em acessibilidade física e digital, como audiodescrição e consultoria em
    acessibilidade arquitetônica.
    Trabalhamos com equipes qualificadas para garantir que eventos, empresas e plataformas sejam acessíveis, promovendo
    a inclusão com eficiência e responsabilidade.
  </p>

  </head>

  <body>
    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 2.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Piso tátil direcional
              </h2>
              <p class="description">O piso tátil auxilia pessoas com deficiência visual na orientação e deslocamento seguro em espaços públicos, garantindo acessibilidade e autonomia.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 3.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Rampa com corrimão acessível
              </h2>
              <p class="description">Instalada com inclinação adequada e corrimão lateral, a rampa garante acesso seguro e autônomo a cadeirantes e pessoas com mobilidade reduzida.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 4.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Plataforma em ônibus
              </h2>
              <p class="description">Equipamento essencial para inclusão no transporte coletivo, permitindo que cadeirantes embarquem e desembarquem com segurança e independência.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 8.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Teclado comunicacional
              </h2>
              <p class="description">Teclado com símbolos de acessibilidade auditiva e visual, voltado à inclusão digital de pessoas com deficiência em ambientes online e tecnológicos.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 9.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Botão de elevador com braile 
              </h2>
              <p class="description">Botões com sinalização em braile permitem a identificação dos andares de forma autônoma, promovendo inclusão, segurança e independência</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 10.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Estacionamento demarcado
              </h2>
              <p class="description">Vaga sinalizada para pessoas com deficiência ou mobilidade reduzida, assegurando direito de estacionamento próximo a entradas e serviços respeitando a legislação.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 16.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Corrimão em escada adaptada
              </h2>
              <p class="description">A instalação de corrimão em escadas internas garante apoio e segurança, essencial para pessoas com deficiência, idosos e qualquer indivíduo com dificuldade de locomoção.</p>

            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 15.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Barra de Apoio
              </h2>
              <p class="description">Colocada próxima à pia, essa barra proporciona suporte para pessoas com mobilidade reduzida em ações diárias de higiene pessoal proporcionando autonomia e segurança.</p>
            </div>
          </div>
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              <div class="card-image">
                <img src="../img/image 17.png" alt="" class="card-img">
              </div>
            </div>

            <div class="card-content">
              <h2 class="name">Rampa universal
              </h2>
              <p class="description">Estrutura com inclinação adequada e corrimão duplo, permite acesso seguro de cadeirantes e pessoas com mobilidade reduzida, substituindo ou complementando escadasa de edifícios.</p>

            </div>
          </div>
        </div>
      </div>

      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>

  </body>

  <!-- Swiper JS -->
  <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

  <!-- JavaScript -->
  <!--Uncomment this line-->
  <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
  <script src= "../js/script.js" > </script>
  <script src="../js/carrousselS.js"></script>

</body>

</html>