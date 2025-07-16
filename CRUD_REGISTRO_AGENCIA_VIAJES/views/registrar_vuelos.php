<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vuelo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="js/validaciones.js"></script>

</head>
<body>

<section class="section" style="min-height: 100vh;">
  <div class="container">
    <div class="box" style="max-width: 600px; margin: 0 auto;">
      <h2 class="title is-3 has-text-centered has-text-link mb-5">
        ✈️ Registrar Vuelo
      </h2>

      <form action="index.php?action=guardar_vuelo" method="POST">
        <!-- Campo Origen -->
        <div class="field">
          <label class="label">🛫 Origen</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="text" name="origen" placeholder="Ej. Santiago" required>
            <span class="icon is-small is-left">
              <i class="fas fa-plane-departure"></i>
            </span>
          </div>
        </div>

        <!-- Campo Destino -->
        <div class="field">
          <label class="label">🛬 Destino</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="text" name="destino" placeholder="Ej. Buenos Aires" required>
            <span class="icon is-small is-left">
              <i class="fas fa-plane-arrival"></i>
            </span>
          </div>
        </div>

        <!-- Campo Fecha -->
        <div class="field">
          <label class="label">📅 Fecha del vuelo</label>
          <div class="control">
            <input class="input is-rounded" type="date" name="fecha" required>
          </div>
        </div>

        <!-- Campo Plazas -->
        <div class="field">
          <label class="label">👥 Plazas disponibles</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="plazas" min="1" placeholder="Ej. 50" required>
            <span class="icon is-small is-left">
              <i class="fas fa-chair"></i>
            </span>
          </div>
        </div>

        <!-- Campo Precio -->
        <div class="field">
          <label class="label">💰 Precio (CLP)</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" step="0.01" min="0" name="precio" placeholder="Ej. 79900" required>
            <span class="icon is-small is-left">
              <i class="fas fa-dollar-sign"></i>
            </span>
          </div>
        </div>

        <!-- Botón guardar -->
        <div class="field mt-5">
          <button class="button is-primary is-fullwidth is-medium" type="submit">
            Guardar Vuelo
          </button>
        </div>

      +
      </form>
    </div>
  </div>
</section>

</body>
</html>
