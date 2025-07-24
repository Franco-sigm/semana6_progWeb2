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

  <!-- Íconos opcionales -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- ✅ MENÚ SUPERIOR -->
<nav class="navbar is-link" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      ✈️ Agencia de Viajes
    </a>
  </div>

  <div class="navbar-menu">
    <div class="navbar-start">
      <a href="index.php?action=registrar_vuelo" class="navbar-item">Registrar Vuelo</a>
      <a href="index.php?action=registrar_hotel" class="navbar-item">Registrar Hotel</a>
      <a href="index.php?action=registrar_reserva" class="navbar-item">Registrar Reserva</a>
      <a href="index.php?action=hoteles_con_reservas" class="navbar-item">🏨 Ver hoteles con +2 reservas</a>

      
    </div>
  </div>
</nav>

<!-- ✅ CONTENIDO PRINCIPAL -->
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
        echo '<div class="notification is-success">
                <button class="delete"></button>
                Vuelo registrado con éxito.
              </div>';
              /*'<div class="notification is-success is-light">
                ✈️ Vuelo registrado con éxito.
              </div>';*/
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
        echo '<div class="notification is-success">
                <button class="delete"></button>
                Reserva guardada con éxito.
              </div>';
        break;
    

    
    default:
        echo '<h2 class="title is-3 has-text-centered mt-6">Bienvenido a la Agencia de Viajes</h2>';
        break;
}
?>

  </div>
</section>

</body>
</html>
