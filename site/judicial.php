<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Politica e Privacidade</title>
  <link rel="stylesheet" href="../css/judicial.css" />
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
        <li class="sub-link"><a href="profile.html">Meu Perfil</a></li>
      <?php endif; ?>
      <?php if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']): ?>
        <li class="sub-link"><a href="../site/register.html">Registrar</a></li>
        <li class="sub-link"><a href="../site/login.html">Faça seu login</a></li>
      <?php endif; ?>
      <li class="sub-link"><a href="../site/judicial.html">Consultoria Jurídica</a></li>
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

  <section class="politica-privacidade">
    <div class="conteudo1">
      <div class="txt1">
        <h1>Política e Privacidade da Acolhe+</h1>
        <p>
          A Acolhe+ respeita a sua privacidade e está comprometida com a proteção dos seus dados pessoais.
          Esta Política de Privacidade descreve como coletamos, usamos, armazenamos e protegemos suas informações,
          em conformidade com a Lei Geral de Proteção de Dados Pessoais (Lei nº 13.709/2018 – LGPD).
        </p>


        <h2>Dados coletados</h2>
        <p>
          Coletamos dados como nome, e-mail, telefone, CNPJ, e endereço,
          quando fornecidos por você ao se registrar ou contratar nossos serviços.
        </p>

        <h2>Finalidade da coleta</h2>
        <p>
          Utilizamos os dados para:<br>
          - Prestar os serviços contratados.<br>
          - Entrar em contato para suporte e informações.<br>
          - Validar a Pessoa Jurídica (CNPJ).
        </p>

        <h2>Compartilhamento de dados</h2>
        <p>
          Seus dados não são compartilhados com terceiros,
          salvo quando necessário para a execução do serviço ou por obrigação legal.
        </p>

        <h2>Direitos do titular</h2>
        <p>
          Você pode acessar, corrigir, excluir ou solicitar a portabilidade de seus dados a qualquer momento,
          enviando uma solicitação para: acolhemais@gmail.com.
        </p>

        <h2>Segurança</h2>
        <p>
          Adotamos medidas técnicas e administrativas para proteger seus dados contra acessos não autorizados.
        </p>
      </div>
    </div>

    <div class="conteudo2">
      <div class="txt2">
        <h1>Termos de Uso</h1>
        <p>
          Estes Termos de Uso regulam o acesso e uso do site e dos serviços prestados pela nossa agência de
          contratação de serviços de acessibilidade. Ao usar nosso site, você concorda com os termos descritos abaixo.
        </p>

        <h2>Sobre os serviços</h2>
        <p>
          Oferecemos intermediação para contratação de profissionais e consultores especializados em acessibilidade
          (arquitetônica, digital, comunicacional, entre outros).
        </p>

        <h2>Responsabilidades</h2>
        <p>
          A agência atua como intermediadora e garante o repasse fiel das informações.<br>
          O contratante é responsável pela veracidade das informações fornecidas.<br>
          Profissionais contratados devem respeitar os padrões legais e éticos da sua área.
        </p>

        <h2>Cancelamentos e reembolsos</h2>
        <p>
          As condições para cancelamentos e reembolsos estarão descritas em cada
          proposta enviada. Solicitações fora do prazo acordado podem não ser atendidas.
        </p>

        <h2>Propriedade intelectual</h2>
        <p>
          Todos os textos, imagens e materiais do site são de propriedade da [Nome da Agência],
          salvo quando indicado o contrário.
        </p>

        <h2>Alterações nos termos</h2>
        <p>
          Reservamo-nos o direito de alterar estes termos a qualquer momento. A versão atual estará
          sempre disponível no site.
        </p>
      </div>
    </div>

    <div class="conteudo3">
      <div class="txt3">
        <h1>Acessibilidade Digital: Compromisso com a Inclusão</h1>
        <p>
          A [Nome da Agência] está comprometida com a acessibilidade digital
          e segue as diretrizes internacionais do WCAG 2.1 (nível AA), conforme
          o Decreto nº 10.645/2021 e a Lei Brasileira de Inclusão (Lei nº 13.146/2015).
        </p>

        <h2>Nosso site oferece:</h2>
        <ul>
          <li>Navegação por teclado</li>
          <li>Compatibilidade com leitores de tela</li>
          <li>Alto contraste e fontes legíveis</li>
          <li>Alternativas textuais para imagens</li>
          <li>Atendimento acessível via e-mail, WhatsApp e vídeo com intérprete de Libras (quando solicitado)</li>
        </ul>

        <p>
          Se você encontrar qualquer barreira de navegação, entre em contato pelo e-mail: [email de acessibilidade].
        </p>
      </div>
    </div>
  </section>

  <script src="../js/index.js"></script>
</body>

</html>