<!DOCTYPE html>
<html lang="es" translate="off">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700;800&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6500a5bbfa.js" crossorigin="anonymous"></script>
  <title>Menu</title>
  <link rel="stylesheet" href="<?=APP_URL;?>assets/css/main.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body id="body" class="body_move">

  <header class="menu-superior">
    <div class="icon__menu">
      <i class="fas fa-bars" id="btn_open"></i>
    </div>
    <div>
      <button id="logout">
        <i class="fas fa-power-off"></i> 
      </button>
    </div>
  </header>

  <div class="menu__side menu__side_move" id="menu_side">
    <div class="name__page">
      <i class="fa-solid fa-ranking-star"></i>
      <h4 class="title__menu">PuebloVota2023</h4>
    </div>
    <div class="options__menu"> 
      <a href="home">
        <div class="option">
          <i class="fa-solid fa-house"></i>
          <h4>Inicio</h4>
        </div>
        <div class="separator"></div>
      </a>
      <a href="nuevo">
        <div class="option">
          <i class="fa-solid fa-person-circle-plus"></i>
          <h4>Nuevo Integrante</h4>
        </div>
      </a>
      <a href="listado">
        <div class="option">
          <i class="fa-sharp fa-solid fa-list"></i>
          <h4>Listado</h4>
        </div>
      </a>
      <?php

      $tipoUsuario = $_SESSION['tipo'];

      if ($tipoUsuario === 'alcalde') {
        ?>
        <a href="equipo">
          <div class="option">
            <i class="fa-solid fa-people-group"></i>
            <h4>Equipo</h4>
          </div>
          <div class="separator"></div>
        </a>
        <?php
      }
      ?>
      <a href="graficas">
        <div class="option">
          <i class="fa-solid fa-chart-column"></i>
          <h4>Graficas</h4>
        </div>
      </a>
    </div>
  </div>

  <main>
    <?php 
    include $file;
    ?>
  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="<?=APP_URL;?>assets/js/menu.js"></script>
  <script src="<?=APP_URL;?>assets/js/grafica.js"></script>
  <script src="<?=APP_URL;?>assets/js/logout.js"></script>
  <script src="<?=APP_URL;?>assets/js/consulta.js"></script>
  <script src="<?=APP_URL;?>assets/js/alerta.js"></script>
</body>
</html>