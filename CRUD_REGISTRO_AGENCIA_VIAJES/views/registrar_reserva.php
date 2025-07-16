<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar reservas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="js/validaciones.js"></script>
</head>
<body>

<section class="section ">
  <div class="container">
    <div class="box" style="max-width: 600px; margin: 0 auto;">
      <h2 class="title is-4 has-text-centered has-text-link mb-5">
        📋 Ingresar Nueva Reserva
      </h2>

      <form action="index.php?action=guardar_reserva" method="POST">

        <!-- ID Cliente -->
        <div class="field">
          <label class="label">👤 ID Cliente</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="id_cliente" placeholder="Ej: 101" required>
            <span class="icon is-small is-left">
              <i class="fas fa-id-card"></i>
            </span>
          </div>
        </div>

        <!-- Fecha de Reserva -->
        <div class="field">
          <label class="label">📅 Fecha de Reserva</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="date" name="fecha_reserva" required>
            <span class="icon is-small is-left">
              <i class="fas fa-calendar-alt"></i>
            </span>
          </div>
        </div>

        <!-- ID Vuelo -->
        <div class="field">
          <label class="label">✈️ ID Vuelo</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="id_vuelo" placeholder="Ej: 25" required>
            <span class="icon is-small is-left">
              <i class="fas fa-plane-departure"></i>
            </span>
          </div>
        </div>

        <!-- ID Hotel -->
        <div class="field">
          <label class="label">🏨 ID Hotel</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="id_hotel" placeholder="Ej: 12" required>
            <span class="icon is-small is-left">
              <i class="fas fa-bed"></i>
            </span>
          </div>
        </div>

        <!-- Botón -->
        <div class="field mt-5">
          <button type="submit" class="button is-primary is-fullwidth is-medium">
            💾 Guardar Reserva
          </button>
        </div>

      </form>
    </div>
  </div>
</section>

</body>
</html>
