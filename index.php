<?php
$action = $_GET['action'] ?? 'inicio';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agencia de Viajes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

  <!-- Íconos FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.css">

  <link rel="stylesheet" href="styles/style.css">

  <style>
    /* personalizaciones pequeñas */
    body {
      background: #f0f4f8;
    }
    .hero {
      background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1470&q=80');
      background-size: cover;
      background-position: center center;
      color: white;
    }
    footer.footer {
      background-color: #3273dc;
      color: white;
      padding: 2rem 1.5rem;
      text-align: center;
      margin-top: 3rem;
    }
  </style>

</head>
<body>

<!-- MENÚ SUPERIOR con burger para móvil -->
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item has-text-weight-bold is-size-4" href="index.php">
      <i class="fas fa-plane-departure"></i> Agencia de Viajes
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navMenu" class="navbar-menu">
    <div class="navbar-start">
      <a href="index.php?action=registrar_vuelo" class="navbar-item">Registrar Vuelo</a>
      <a href="index.php?action=registrar_hotel" class="navbar-item">Registrar Hotel</a>
      <a href="index.php?action=registrar_reserva" class="navbar-item">Registrar Reserva</a>
      <a href="index.php?action=hoteles_con_reservas" class="navbar-item">🏨 Hoteles con +2 reservas</a>
    </div>
  </div>
</nav>

<!-- HERO/BANNER DE BIENVENIDA -->
<section class="hero is-medium">
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title is-1 has-text-white">Bienvenido a la Agencia de Viajes</h1>
      <h2 class="subtitle is-4 has-text-white">Encuentra los mejores vuelos, hoteles y reserva con confianza</h2>
      <a href="index.php?action=registrar_vuelo" class="button is-primary is-large mt-4">
        <i class="fas fa-plane"></i> Reserva tu vuelo
      </a>
    </div>
  </div>
</section>

<!-- CONTENIDO PRINCIPAL -->
<section class="section">
  <div class="container">

<?php
// Aquí se ejecutan las acciones
switch ($action) {
    case 'guardar_vuelo':
        require_once 'controllers/VueloController.php';
        $controlador = new VueloController();
        $controlador->guardar();
        break;
    
    case 'guardar_hotel':
        require_once 'controllers/hotelcontroller.php';
        $controlador = new hotelController();
        $controlador->guardar();
        break;
        
    case 'guardar_reserva':
        require_once 'controllers/reservaController.php';
        $controlador = new ReservaController();
        $controlador->guardar();
        break;
    
    case 'hoteles_con_reservas':
        require_once 'controllers/reservaController.php';
        (new ReservaController())->mostrarHotelesPopulares();
        break;
      
    case 'vuelo_listo':
        echo '<div class="notification is-success is-light">
                <button class="delete"></button>
                ✈️ Vuelo registrado con éxito.
              </div>';
        break;
    case 'hotel_listo':
        echo '<div class="notification is-success is-light">
                🏨 Hotel registrado con éxito.
              </div>';
        break;

    case 'registrar_vuelo':
        include 'views/registrar_vuelos.php';
        break;

    case 'registrar_hotel':
        include 'views/registrar_hotel.php';
        break;
    case 'registrar_reserva':
        include 'views/registrar_reserva.php';
        break;
    case 'reserva_guardada':
        echo '<div class="notification is-success is-light">
                <button class="delete"></button>
                Reserva guardada con éxito.
              </div>';
        break;
    
    default:
        // Ya tenemos hero arriba, aquí lo dejamos vacío o ponemos info extra si quieres
        break;
}
?>

  </div>
</section>

<!-- FOOTER SIMPLE -->
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Agencia de Viajes</strong> &copy; <?php echo date('Y'); ?>. Todos los derechos reservados.
    </p>
  </div>
</footer>

<!-- Bulma navbar burger script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const burger = document.querySelector('.navbar-burger');
  const menu = document.getElementById('navMenu');
  burger.addEventListener('click', () => {
    burger.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });
});
</script>

</body>
</html>
