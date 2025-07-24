<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Hotel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="styles/style.css">
   <script src="js/validaciones.js"></script>

</head>
<body>

<section class="section " style="min-height: 100vh;">
  <div class="container">
    <div class="box" style="max-width: 600px; margin: 0 auto;">
      <h2 class="title is-3 has-text-centered has-text-link mb-5">
        🏨 Registrar Hotel
      </h2>

      <form action="index.php?action=guardar_hotel" method="POST">
        <!-- Nombre del hotel -->
        <div class="field">
          <label class="label">🏛️ Nombre del hotel</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="text" name="nombre" placeholder="Ej. Hotel Andes" required>
            <span class="icon is-small is-left">
              <i class="fas fa-building"></i>
            </span>
          </div>
        </div>

        <!-- Ubicación -->
        <div class="field">
          <label class="label">📍 Ubicación</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="text" name="ubicacion" placeholder="Ej. Valdivia, Chile" required>
            <span class="icon is-small is-left">
              <i class="fas fa-map-marker-alt"></i>
            </span>
          </div>
        </div>

        <!-- Habitaciones disponibles -->
        <div class="field">
          <label class="label">🚪 Habitaciones disponibles</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="habitaciones_disponibles" min="1" placeholder="Ej. 25" required>
            <span class="icon is-small is-left">
              <i class="fas fa-door-open"></i>
            </span>
          </div>
        </div>

        <!-- Tarifa por noche -->
        <div class="field">
          <label class="label">💲 Tarifa por noche (CLP)</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="tarifa_noche" step="0.01" min="0" placeholder="Ej. 55900" required>
            <span class="icon is-small is-left">
              <i class="fas fa-money-bill-wave"></i>
            </span>
          </div>
        </div>

        <!-- Botón guardar -->
        <div class="field mt-5">
          <button class="button is-primary is-fullwidth is-medium" type="submit">
            Guardar Hotel
          </button>
        </div>

            </a>
        </div>

      </form>
    </div>
  </div>
</section>

</body>
</html>
