<?php
require_once(__DIR__ . '/../models/Hotel.php');
require_once(__DIR__ . '/../bd/conexiondb.php');

class HotelController {
    public function guardar() {
        global $conn;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "⚠️ Acceso inválido.";
            return;
        }

        // Validación mejorada
        $errores = $this->validarDatos($_POST);
        if (!empty($errores)) {
            echo "❌ Errores:\n" . implode("\n", $errores);
            return;
        }

        // Procesamiento original (sin cambios)
        $resultado = Hotel::insertar(
            $conn,
            trim($_POST['nombre']),
            trim($_POST['ubicacion']),
            (int)$_POST['habitaciones_disponibles'],
            (float)$_POST['tarifa_noche']
        );

        if ($resultado) {
            header("Location: index.php?action=hotel_listo");
            exit();
        } else {
            echo "❌ Error al guardar el hotel.";
        }
    }

    /**
     * Nueva función de validación (privada)
     */
    private function validarDatos(array $data): array {
        $errores = [];

        // Validar nombre (requerido y longitud máxima)
        if (empty(trim($data['nombre'] ?? ''))) {
            $errores[] = "El nombre del hotel es obligatorio.";
        } elseif (strlen(trim($data['nombre'])) > 100) {
            $errores[] = "El nombre no puede exceder 100 caracteres.";
        }

        // Validar ubicación (requerida)
        if (empty(trim($data['ubicacion'] ?? ''))) {
            $errores[] = "La ubicación es obligatoria.";
        }

        // Validar habitaciones (entero positivo)
        if (!filter_var($data['habitaciones_disponibles'] ?? 0, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1]
        ])) {
            $errores[] = "Las habitaciones deben ser un número entero positivo.";
        }

        // Validar tarifa (número positivo)
        if (!filter_var($data['tarifa_noche'] ?? 0, FILTER_VALIDATE_FLOAT, [
            'options' => ['min_range' => 0]
        ])) {
            $errores[] = "La tarifa debe ser un número positivo.";
        }

        return $errores;
    }
}