<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hoteles populares</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="styles/style.css">
  <script src="js/validaciones.js"></script>
</head>
<body>

<section class="section">
  <div class="container">
    <h2 class="title is-4 has-text-centered">🏨 Hoteles con más de 2 reservas</h2>

    <?php if (mysqli_num_rows($resultado) > 0): ?>
      <table class="table is-hoverable is-fullwidth has-text-centered my-custom-table">
        <thead>
          <tr >
            <th><i class="fas fa-hotel"></i> ID Hotel</th>
            <th><i class="fas fa-signature"></i> Nombre</th>
            <th><i class="fas fa-map-marker-alt"></i> Ubicación</th>
            <th><i class="fas fa-chart-bar"></i> Reservas Totales</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr class="has-text-centered">
              <td><?= $fila['id_hotel'] ?></td>
              <td><?= $fila['nombre'] ?></td>
              <td><?= $fila['ubicacion'] ?></td>
              <td><strong class="has-text-info"><?= $fila['total_reservas'] ?></strong></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="notification is-warning ">
        😶 No hay hoteles con más de 2 reservas.
      </div>
    <?php endif; ?>
  </div>
</section>
</body>
</html>
