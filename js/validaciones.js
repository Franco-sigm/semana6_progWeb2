document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.querySelector("form");

  // Validaciones comunes
  formulario.addEventListener("submit", e => {
    const campos = formulario.querySelectorAll("input[required]");
    let errores = [];

    campos.forEach(campo => {
      if (campo.value.trim() === "") {
        errores.push(`El campo "${campo.name}" está vacío`);
      }
    });

    // Validación específica para vuelos
    if (formulario.querySelector('[name="origen"]')) {
      const plazas = formulario.querySelector('[name="plazas"]').value;
      if (plazas <= 0) errores.push("Las plazas deben ser mayores a 0");
    }

    // Validación específica para hoteles
    if (formulario.querySelector('[name="tarifa_noche"]')) {
      const tarifa = formulario.querySelector('[name="tarifa_noche"]').value;
      if (tarifa <= 0) errores.push("La tarifa debe ser positiva");
    }

    if (errores.length > 0) {
      alert("⚠️ Errores encontrados:\n" + errores.join("\n"));
      e.preventDefault();
    }
  });
});
